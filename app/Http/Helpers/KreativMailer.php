<?php

namespace App\Http\Helpers;

use App\EmailTemplate;
use App\Language;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class KreativMailer {

    public function mailFromAdmin($data) {
        $temp = EmailTemplate::where('email_type', '=', $data['templateType'])->first();

        $body = $temp->email_body;
        if (array_key_exists('customer_name', $data)) {
            $body = preg_replace("/{customer_name}/", $data['customer_name'], $body);
        }
        if (array_key_exists('customer_username', $data)) {
            $body = preg_replace("/{customer_username}/", $data['customer_username'], $body);
        }
        if (array_key_exists('package_name', $data)) {
            $body = preg_replace("/{package_name}/", $data['package_name'], $body);
        }
        if (array_key_exists('cause_name', $data)) {
            $body = preg_replace("/{cause_name}/", $data['cause_name'], $body);
        }
        if (array_key_exists('event_name', $data)) {
            $body = preg_replace("/{event_name}/", $data['event_name'], $body);
        }
        if (array_key_exists('ticket_id', $data)) {
            $body = preg_replace("/{ticket_id}/", $data['ticket_id'], $body);
        }
        if (array_key_exists('activation_date', $data)) {
            $body = preg_replace("/{activation_date}/", $data['activation_date'], $body);
        }
        if (array_key_exists('expire_date', $data)) {
            $body = preg_replace("/{expire_date}/", $data['expire_date'], $body);
        }
        if (array_key_exists('order_number', $data)) {
            $body = preg_replace("/{order_number}/", $data['order_number'], $body);
        }
        if (array_key_exists('order_link', $data)) {
            $body = preg_replace("/{order_link}/", $data['order_link'], $body);
        }
        if (array_key_exists('verification_link', $data)) {
            $body = preg_replace("/{verification_link}/", $data['verification_link'], $body);
        }
        if (array_key_exists('remaining_days', $data)) {
            $body = preg_replace("/{remaining_days}/", $data['remaining_days'], $body);
        }
        if (array_key_exists('current_package_name', $data)) {
            $body = preg_replace("/{current_package_name}/", $data['current_package_name'], $body);
        }
        if (array_key_exists('packages_link', $data)) {
            $body = preg_replace("/{packages_link}/", $data['packages_link'], $body);
        }
        if (array_key_exists('expired_package', $data)) {
            $body = preg_replace("/{expired_package}/", $data['expired_package'], $body);
        }
        if (array_key_exists('website_title', $data)) {
            $body = preg_replace("/{website_title}/", $data['website_title'], $body);
        }

        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }

        $mail = new PHPMailer(true);


            try {

                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'jobid@ubids.edu.gh';
                $mail->Password   = 'b7ye6z9h1';
                $mail->SMTPSecure = 'TLS';
                $mail->Port       = '587';

            } catch (Exception $e) { }

        try {

            //Recipients
            $mail->setFrom('jobid@ubids.edu.gh', 'Shanti Jewelry');
            $mail->addAddress($data['toMail'], $data['toName']);

            // Attachments
            if (array_key_exists('attachment', $data) && $data['type'] == 'productOrder') {
                $mail->addAttachment('assets/frontend/invoices/product/' . $data['attachment']);
            }

            // Content
            $mail->isHTML(true);
            $mail->Subject = $temp->email_subject;
            $mail->Body    = $body;

            $mail->send();
        } catch (Exception $e) { }
    }

}
