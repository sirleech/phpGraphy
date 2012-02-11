#!/bin/bash

# This is a little script I wrote on the basis that I do not wish to have
# phpgraphy's files intermixed with my picture files. So... I create links
# of all of my files instead, allowing phpgraphy to think they are there.
# Its a simple hack I thought I'd share.

# I also suggest a cron job to run the script nightly.

# Goal: Re-create links of pictures without removing any script-created files.
# Script-created files include directories called .thumbs, and 'hidden' files (st. w/ dot).
# Another feature copies any files that seem to have been uploaded to the source directory.

# Directory where your files are originally held
source_dir="/data/home/mikmorg/Briefcase/My Pictures"

# Directory where we should keep the links
run_dir="/data/www/pictures.mdmsolutions.org/pictures"

# Features:
mv_uploads=1   # comment this line to not move uploaded files
#genall=1       # comment this line to not generate images
rm_empties=1   # comment this line to not remove empty folders
rm_oldlinks=1  # comment this line to not remove old links
source_perms=1 # comment this line to not change source directory permissions

# A directory in run_dir that is exempt from deletion if the
# folder is empty. I use this for my 'Uploads' folder, so that
# when empty, it remains on the system.
exempt_empty=Uploads

# Ownership of files in source_dir.
owner=mikmorg
group=datausrs

# Info required to generate all associated images
website_loc="http://pictures.mdmsolutions.org"
admin_user=mikmorg
#admin_passwd= # comment this line to be asked for this value

###############################################################################
###########################    End config.    #################################
###############################################################################
# There should be no reason to modify below this line.

# Move uploaded files to source directory
[ "$mv_uploads" ] && {
	echo Moving uploads...
	last="`pwd`"
	cd "$run_dir/"
	find \! -wholename '*/.thumbs/*' -type f \! -name '.*' -print0 | xargs -i -0 \
	        install -D -p --owner="$owner" --group="$group" '{}' "$source_dir/"'{}'
	find \! -wholename '*/.thumbs/*' -type f \! -name '.*' -print0 | xargs -0 rm -f
	cd "$last"
}

# Remove old links and empty folders
[ "$rm_oldlinks" ] && {
	echo Removing old links...
	find "$run_dir/" -type l -print0 | xargs -0 rm -f
}
[ "$rm_empties" ] && {
	echo Removing empty directories...
	[ "$exempt_empty" ] && exempt_empty_rule="! -name '$exempt_empty'"
	find "$run_dir/" -empty -type d $exempt_empty_rule -print0 | xargs -0 rm -rf
}

# Create links of all files in My Pictures
echo Creating latest links...
cp -as "$source_dir/"* "$run_dir/"

# Change ownership of all folders so that apache can create thumbnails.
echo Changing permissions...
find "$run_dir/" -type d -print0 | xargs -0 chown apache:datausrs
find "$run_dir/" -type d -print0 | xargs -0 chmod 755


# I use this line because when I add pictures, I may forget to change perms.
[ "$source_perms" ] && \
	chmod -R g+rx,o+rx "$source_dir"

# Used to generate all lowres and thumbnails
[ "$genall" ] && {
	echo "Generating lowres and thumbnail versions (This may take a while)..."
	[ -x "$admin_passwd" ] && {
		read -p "Password: " admin_passwd
	}
	lynx -dump -post_data "$website_loc/?genall=1" << ENDOFFREAK_NFILE >/dev/null 2>&1
user=$admin_user&pass=$admin_passwd&rememberme=&startlogin=1&dir=
---
ENDOFFREAK_NFILE
}
export admin_passwd=''
