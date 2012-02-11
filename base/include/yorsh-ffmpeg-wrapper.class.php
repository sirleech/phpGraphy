<?php

/**
* Yorsh ffmpeg Wrapper PHP class
*
* Unlike ffmpeg-php that does require to recompile your php binary, this simple wrapper
* will give you the opportunity to use the ffmpeg binary, I did choose to use the same
* functions names on purpose so that it may be easier to switch to/from ffmpeg-php.
*
* Originally written for phpGraphy {@link http://phpgraphy.sourceforge.net}
*
* @author JiM / aEGIS
* @version 0.3.1
* @copyright 2005/2006 - jim [at] aegis [hyphen] corp [dot] org
*
* $Id: yorsh-ffmpeg-wrapper.class.php 414 2007-05-09 15:54:00Z jim $
*/

class YorshffmpegWrapper
{

    function YorshffmpegWrapper($filepath, $ffmpeg_path = "ffmpeg")
    {
        $this->_ffmpeg_binary = $ffmpeg_path;
        $this->_output = array();

        // TODO: Make this Windows compatible
        $cmd = $ffmpeg_path . " -vframes 1 -i " . escapeshellarg($filepath) . ' -y -f mjpeg /dev/null 2>&1';
        @exec($cmd, $this->_output, $returncode);

        trigger_error('DEBUG: '.__FUNCTION__.'(exec): '.$cmd, E_USER_NOTICE);
        trigger_error('DEBUG: '.__FUNCTION__.'(return_code): '.$returncode, E_USER_NOTICE);

        if ($returncode) {
            trigger_error('DEBUG: '.__FUNCTION__.'(): An error has occured while trying to execute ffmpeg ('.$ffmpeg_path.')', E_USER_WARNING);
            return false;
        }

        $this->parseOutput();

    }

    function parseOutput()
    {

        // This has only been tested with ffmpeg version 0.4.9-pre1, build 4747 under Linux

        $this->_file_info = array(
            "filename"         => "", // Filename (with optionnal path as given from command line)
            "filetype"         => "", // Filetype (eg: mpeg, avi, mp3)
            "duration"         => "", // Total Duration (Format hh:mm:ss:i)
            "bitrate"          => "", // Global Bitrate (video + audio) in kb/s
            "audio.codec"      => "", // Audio Codec (eg: mp2, mp3, etc.)
            "audio.frequency"  => "", // Audio Frequency in Hz (eg: 44100 Hz)
            "audio.chantype"   => "", // Channel Type (eg: mono, stereo)
            "audio.bitrate"    => "", // Audio Bitrate in kb/s
            "video.codec"      => "", // Video Codec (eg: mpeg1video, mpeg2video)
            "video.resolution" => "", // Video Resolution (Width x Height)
            "video.palette"    => "", // Video color palette (eg: yuv420p)
            "video.width"      => "", // Video Frame Width
            "video.height"     => "", // Video Frame Height
            "video.framerate"  => "", // Video Framerate in fps
            "video.bitrate"    => "", // Video Bitrate in kb/s
            );

        foreach ($this->_output as $line) {

            // echo $line . "\n";

            // Looking for strings like:
            // Input #0, mpeg, from 'robot.avi':
            preg_match("/Input #0, ([\w,]+), from '(.+)'/", $line, $matches);
            if ($matches) {
                $this->_file_info["filetype"] = $matches[1];
                $this->_file_info["filename"] = $matches[2];
            }

            // Looking for strings like:
            // Duration: 00:00:00.3, start: 0.177778, bitrate: 4905 kb/s
            preg_match("/Duration: (\d{2}:\d{2}:\d{2}.\d+),.*bitrate: (\d+) kb\/s/", $line, $matches);
            if ($matches) {
                $this->_file_info["duration"] = $matches[1];
                $this->_file_info["bitrate"]  = $matches[2];
            }

            // Looking for strings like:
            // Stream #0.0: Audio: mp2, 32000 Hz, mono, 32 kb/s
            // Stream #0.0: Audio: 0x6134706d, 32000 Hz, stereo
            // Stream #0.1(eng): Audio: Qclp / 0x706C6351, 11025 Hz, mono
            preg_match("/Audio: (\w+)( \/ \w+)?(, (\d+) Hz)?(, (mono|stereo))?(, (\d+) kb\/s)?/", $line, $matches);
            if ($matches) {
                if (!preg_match('0x[a-z0-9]+', $matches[1])) $this->_file_info["audio.codec"] = $matches[1];
                $this->_file_info["audio.frequency"] = $matches[4];
                $this->_file_info["audio.chantype"]  = $matches[6];
                $this->_file_info["audio.bitrate"]   = $matches[8];
            }

            // Looking for strings like:
            // Stream #0.1: Video: mpeg1video, 160x112, 25.00 fps, 104857 kb/s
            // Stream #0.1: Video: wmv2, 320x240, 1000.00 fps
            // Stream #0.1: Video: msmpeg4, yuv420p, 192x144, 1000.00 fps
            // Stream #0.0(eng),  8.00 fps(r): Video: svq1, yuv410p, 192x144
            preg_match("/((\d+.\d+) fps\(\w+\): )?Video: (\w+)(, (\w+))?, (\d+)x(\d+)(, (\d+.\d+) fps)?(, (\d+) kb\/s)?/", $line, $matches);
            if ($matches) {
                $this->_file_info["video.codec"]       = $matches[3];
                $this->_file_info["video.palette"]     = $matches[5];
                $this->_file_info["video.width"]       = $matches[6];
                $this->_file_info["video.height"]      = $matches[7];
                if ($matches[2]) $this->_file_info["video.framerate"]  = $matches[2];
                elseif ($matches[9]) $this->_file_info["video.framerate"] = $matches[9];
                $this->_file_info["video.bitrate"]     = $matches[11];

                if ($this->_file_info["video.width"] && $this->_file_info["video.height"]) {
                    $this->_file_info["video.resolution"] = $this->_file_info["video.width"] . "x" . $this->_file_info["video.height"];
                }
            }

        }
        
        return;
    }

    function getFileInfo()
    {
        if (is_array($this->_file_info)) return $this->_file_info; else return;

    }

    function getFilename()
    {
        if ($this->_file_info["filename"]) return $this->_file_info["filename"]; else return;
    }

    function getFileType()
    {
        if ($this->_file_info["filetype"]) return $this->_file_info["filetype"]; else return;
    }

    function getDuration()
    {
        if ($this->_file_info["duration"]) return $this->_file_info["duration"]; else return;
    }

    function getBitRate()
    {
        if ($this->_file_info["bitrate"]) return $this->_file_info["bitrate"]; else return;
    }

    function getAudioCodec()
    {
        if ($this->_file_info["audio.codec"]) return $this->_file_info["audio.codec"]; else return;
    }

    function getAudioFrequency()
    {
        if ($this->_file_info["audio.frequency"]) return $this->_file_info["audio.frequency"]; else return;
    }

    function getAudioChanType()
    {
        if ($this->_file_info["audio.chantype"]) return $this->_file_info["audio.chantype"]; else return;
    }

    function getAudioBitRate()
    {
        if ($this->_file_info["audio.bitrate"]) return $this->_file_info["audio.bitrate"]; else return;
    }

    function getVideoCodec()
    {
        if ($this->_file_info["video.codec"]) return $this->_file_info["video.codec"]; else return;
    }

    function getVideoResolution()
    {
        if ($this->_file_info["video.resolution"]) return $this->_file_info["video.resolution"]; else return;
    }

    function getVideoPalette()
    {
        if ($this->_file_info["video.palette"]) return $this->_file_info["video.palette"]; else return;
    }

    function getFrameWidth()
    {
        if ($this->_file_info["video.width"]) return $this->_file_info["video.width"]; else return;
    }

    function getFrameHeight()
    {
        if ($this->_file_info["video.height"]) return $this->_file_info["video.height"]; else return;
    }

    function getFrameRate()
    {
        if ($this->_file_info["video.framerate"]) return $this->_file_info["video.framerate"]; else return;
    }

    function getVideoBitRate()
    {
        if ($this->_file_info["video.bitrate"]) return $this->_file_info["video.bitrate"]; else return;
    }

    function getHasAudio()
    {
        if ($this->_file_info["audio.codec"]) return true; else return false;
    }

    /**
     * Extract a single frame from a video, if not specified, it does extract the first frame
     * @param: string $output_filename
     * @param: string optionnal $seek_position - Seek to given time position in seconds.  "hh:mm:ss[.xxx]" syntax is also supported.
     * @param: string optionnal $size - Set frame size. format is wxh. If not specified ffmpeg binary default is used (160x128)
     */
    function extractFrameToJpeg($output_filename, $seek_position = 1, $size = '')
    {

        if (!$this->_file_info["duration"]) {
            trigger_error(__FUNCTION__.'(): Unknow file duration, this is not good, trying anyway...', E_USER_WARNING);
            //return false;
        }


        // ffmpeg -vframes 1 -i video.avi -ss 00:00:01.000 -y -f mjpeg frame.jpg
        $cmd = $this->_ffmpeg_binary . ' -vframes 1 -i ' . escapeshellarg($this->_file_info['filename']);
        $cmd .= ' -ss ' . $seek_position;
        if (preg_match('/^\d{1,4}x\d{1,4}$/',$size)) $cmd .= ' -s ' . $size;
        $cmd .= ' -y -f mjpeg ' . escapeshellarg($output_filename) . ' 2>&1';

        trigger_error('DEBUG: '.__FUNCTION__.'(exec): '.$cmd, E_USER_NOTICE);
        @exec($cmd,$exec_output,$return_code);

        //print_r($exec_output);

        if (!$return_code) {
            // Search for 'frame= 1'
            foreach($exec_output as $exec_output_line) {
               if (preg_match('/^frame=\s+1/', $exec_output_line)) return true;
            }
            trigger_error(__FUNCTION__.'(): Failed, no frame has been extracted' , E_USER_WARNING);
            return false;
        } else {
            $exec_ouput_last_line_nb = count($exec_output) - 1;
            // Removing output file if present but zero byte
            if (file_exists($output_filename) && filesize($output_filename) == 0) {
                unlink($output_filename);
            }
            trigger_error(__FUNCTION__.'(): Failed - return_code('.$return_code.')', E_USER_WARNING);
            trigger_error('DEBUG: '. __FUNCTION__.'(): Failed - error_msg('.$exec_output[$exec_ouput_last_line_nb].')', E_USER_NOTICE);
            return false;
        }

    }

}

?>
