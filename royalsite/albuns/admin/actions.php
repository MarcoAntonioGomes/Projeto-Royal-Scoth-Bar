<?php

@header( 'Content-Type: text/html; charset=iso-8859-1' );
require_once '../database/mysql.php';
require_once '../class/Session.class.php';
require_once '../class/Upload.class.php';
$db = new Mysql;
$sid = new Session;
$sid->start();
if ( !$sid->check() )
{
    @header( 'Location: login.php' );
}

if ( isset( $_GET['action'] ) )
{
    $action = $_GET['action'];
    $action();
}

function fulltrim( $str )
{
    return trim( preg_replace( '/\s+/', ' ', $str ) );
}

function updateAlbumName()
{
    $album_name = fulltrim( $_POST['album_name'] );
    $album_name = utf8_decode($album_name);
    $album_id = $_POST['album_id'];
    $db = new Mysql;
    $db->query( "update albuns set album_name = '$album_name' where album_id = $album_id" );
    echo 'Álbum Atualizado: <Br/>' . $album_name;
}

function updateFotoCover()
{
    $foto_album = $_POST['foto_album'];
    $foto_id = $_POST['foto_id'];
    $db = new Mysql;
    $db->query( "update fotos set foto_pos = 1 where foto_album = $foto_album" );
    $db->query( "update fotos set foto_pos = 0 where foto_id = $foto_id" );
    echo 'Cover Atualizado <Br/>';
}

function updateFotoName()
{
    $foto_caption = fulltrim( $_POST['foto_caption'] );
    $foto_info = fulltrim( $_POST['foto_info'] );
    $foto_id = preg_replace( '/f\_/', '', fulltrim( $_POST['foto_id'] ) );
    $db = new Mysql;
    $db->query( "update fotos set foto_caption = '$foto_caption', foto_info = '$foto_info' where foto_id = $foto_id" );
    echo 'Foto Atualizada<Br/>' . $foto_caption;
}

function deleteFoto()
{
    $foto_id = $_POST['foto_id'];
	$db = new Mysql;
	$db->query( "select * from fotos where foto_id = $foto_id" )->fetchAll();
	if ( $db->rows >= 1 )
	{
		$file = "../fotos/" . $db->data[0]['foto_url'];
		if ( file_exists( $file ) )
		{
			@unlink( $file );
		}
		$db->query( "delete from fotos where foto_id = $foto_id" );
	}
    echo 'Foto Removida<Br/>';
}

function updateVideoPos()
{
    extract( $_POST );
    parse_str( $item, $arr );
    $db = new Mysql;
    foreach ( $arr['item'] as $pos => $foto_id )
    {
        $db->query( "update fotos set foto_pos = $pos where foto_id = $foto_id" );
    }
}

?>