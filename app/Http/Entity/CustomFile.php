<?php

namespace App\Http\Entity;

class CustomFile {

    /**
     * @param mixed $file
     */
    public function __construct($file) {
        $this->path = $file;
        $this->file_name = basename($file);
        $this->ext=null;
        $this->type = 'other';
        $this->full_url = config('filesystems.disks.s3.url_public').'/'.$this->path;
        preg_match('/\.(.{1,4}?)$/',$file,$match);
        if(isset($match[1])){
            $this->ext = $match[1];
            if(in_array(strtolower($this->ext),['jpg','gif','png'])){
                $this->type = 'image';
            }
            if(in_array(strtolower($this->ext),['mp3'])){
                $this->type = 'audio';
            }
        }
    }
}
