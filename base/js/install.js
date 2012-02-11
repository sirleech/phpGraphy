function fillTranslationInfo(translatorName, translatorEmail, translationStatus, translationCharset)
{
    document.getElementById('translator-name').innerHTML = translatorName;
    document.getElementById('translator-email').innerHTML = translatorEmail;
    document.getElementById('translation-status').innerHTML = translationStatus;
    document.getElementById('translation-charset').innerHTML = translationCharset;

    return true;
}

function setTranslationInfo()
{
    var selectedLang = document.lang.language_file[document.lang.language_file.options.selectedIndex].value;

    if (langArray[selectedLang] ) { 
       // Create array from string
        var translationInfo = langArray[selectedLang].split(',');
        //  Fill HTML
        fillTranslationInfo(translationInfo[0],translationInfo[1],translationInfo[2],translationInfo[3]);
    }
    
    return true;
}

function switchThumbGenerator() {

    var selectedThumbGenerator = document.imagetools.thumb_generator[document.imagetools.thumb_generator.options.selectedIndex].value;
    
    if (selectedThumbGenerator == 'convert' && hideConvertPath != 1) {
        switch_display_on('thumb_generator_path');
    } else {
        switch_display_off('thumb_generator_path');
    }
    
    return true;

}

function switchRotateTool() {

    var selectedRotateTool = document.imagetools.rotate_tool[document.imagetools.rotate_tool.options.selectedIndex].value;
    
    if (hideRotateToolPath[selectedRotateTool] != 1) {
        switch_display_on('rotate_tool_path');
    } else {
        switch_display_off('rotate_tool_path');
    }
    
    return true;

}

function switchMovieExtractor() {

    var selectedMovieExtractor = document.imagetools.movie_extractor[document.imagetools.movie_extractor.options.selectedIndex].value;
    
    if (hideMovieExtractorPath[selectedMovieExtractor] != 1) {
        switch_display_on('movie_extractor_path');
    } else {
        switch_display_off('movie_extractor_path');
    }
    
    return true;

}

function switchDatabaseType() {

    var selectedDatabaseType = document.database.database_type[document.database.database_type.options.selectedIndex].value;
    
    if (selectedDatabaseType == 'mysql') {
        switch_display_on('mysql-details');
    } else {
        switch_display_off('mysql-details');
    }
    
    return true;

}
