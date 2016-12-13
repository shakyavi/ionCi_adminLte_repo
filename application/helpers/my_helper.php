<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function admin_url($uri = '')
{
    $CI = & get_instance();
    return site_url('admin') . '/' . $uri;
}

function image_url($uri = '')
{
    $CI = &get_instance();
    return base_url() . 'assets/img/' . $uri . '/';
}

function upload_image($image, $target, $thumb = array('dest' => '', 'size' => array('w' => 257, 'h' => 218), 'ratio' => false), $prev_img = NULL)
{
echo $image."<br>".$target;
    $CI = &get_instance();
    initialize_upload($target);
    if ($CI->upload->do_upload($image)) {
        if ($prev_img) {
            if (is_file($target . $prev_img))
                @unlink($target . $prev_img);
        }

        $data = $CI->upload->data();
        $image = $data['file_name'];
        $image_path = $data['full_path'];
        $image_name = $data['raw_name'];
        $image_ext = $data['file_ext'];

        if ($thumb) {
//$thumb_size = array('w' => 200, 'h' =>220);
            if ($thumb['dest'])
                $dest = $thumb['dest'];
            else
                $dest = $target;
            create_thumb($image_path, $dest . $image, $thumb['size'], $thumb['ratio']);
        }
        return $image;
    }
    else {
//		$CI->session->set_flashdata('error_message', $CI->upload->display_errors());
        return false;
//return $CI->upload->display_errors();
    }
}

function initialize_upload($path, $max_size = '0', $max_width = '0', $max_height = '0')
{
    $CI = &get_instance();
    $config['upload_path'] = $path;
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size'] = $max_size;
    $config['max_width'] = $max_width;
    $config['max_height'] = $max_height;
    $config['encrypt_name'] = TRUE;

    $CI->load->library('upload', $config);
}

function create_thumb($src, $dest, $size, $ratio = false)
{
    $CI = &get_instance();

    $config['image_library'] = 'gd2';
    $config['source_image'] = $src;
    $config['new_image'] = $dest;
    $config['create_thumb'] = TRUE;
    if ($ratio)
        $config['maintain_ratio'] = TRUE;
    else
        $config['maintain_ratio'] = FALSE;

    $config['thumb_marker'] = '';

    $config['width'] = $size['w'];
    $config['height'] = $size['h'];

    $CI->load->library('image_lib');
    $CI->image_lib->initialize($config);

    $CI->image_lib->resize();
}

function upload_file($file, $target, $file_type, $prev_file = NULL, $max_size = '102400', &$up_data = NULL, &$err = NULL)
{

    $CI = &get_instance();
    $config['upload_path'] = $target;
    $config['allowed_types'] = $file_type;
    $config['max_size'] = $max_size;

    $CI->load->library('upload', $config);

    if ($CI->upload->do_upload($file)) {
        if ($prev_file) {
            if (is_file($target . $prev_file))
                @unlink($target . $prev_file);
        }

        $up_data = $data = $CI->upload->data();
        $file = $data['file_name'];

        return $file;
    }
    else {
        $err = $CI->upload->display_errors();

        return false;
    }
}

function generateCaptcha()
{
    $CI = & get_instance();
    $CI->load->plugin('captcha');

    $vals = array(
        'word' => '',
        'word_length' => 4,
        'img_path' => './assets/img/captcha/',
        'img_url' => image_url('captcha'),
        'font_path' => './system/fonts/georgiab.ttf',
        'img_width' => '112',
        'img_height' => 52,
        'expiration' => 3600
    );
    $cap = create_captcha($vals);

    return $cap;
}

function unlink_files($fullPathOfFileArray)
{
    foreach ($fullPathOfFileArray as $fullPathOfFile) {
        unlink_file($fullPathOfFile);
    }
}

function unlink_file($fullPathOfFile)
{
    @unlink($fullPathOfFile);
}

function is_active_module($url_module = NULL)
{
    $CI = & get_instance();

    $module = $CI->router->fetch_module();
    return ($url_module === $module) ? "active" : "";
}
