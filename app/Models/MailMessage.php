<?php


namespace app\Models;


interface MailMessage{
	public function getFrom();
	public function getMessage();
	public function getDestinatary();
	public function getSubject();
	public function complete();
	public function failure();
}