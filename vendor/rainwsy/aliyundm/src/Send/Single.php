<?php
namespace Rainwsy\Aliyunmail\Send;

use Rainwsy\Aliyunmail\Base;
use Rainwsy\Aliyunmail\Auth;
use Rainwsy\Aliyunmail\Http\HttpHelper;

class Single extends Base
{

    public $ToAddress;

    public $Subject;

    public $HtmlBody;

    public $FromAlias;

    public $AccountName;

    public $ReplyToAddress = true;

    public $AddressType;

    public function setAccountName($AccountName)
    {
        $this->AccountName = $AccountName;
        return $this;
    }

    public function setReplyToAddress($ReplyToAddress)
    {
        $this->ReplyToAddress = $ReplyToAddress;
        return $this;
    }

    public function setAddressType($AddressType)
    {
        $this->AddressType = $AddressType;
        return $this;
    }

    public function setToAddress($ToAddress)
    {
        $this->ToAddress = $ToAddress;
        return $this;
    }

    public function setSubject($Subject)
    {
        $this->Subject = $Subject;
        return $this;
    }

    public function setHtmlBody($HtmlBody)
    {
        $this->HtmlBody = $HtmlBody;
        return $this;
    }

    public function setFromAlias($FromAlias)
    {
        $this->FromAlias = $FromAlias;
        return $this;
    }

    public function send()
    {
        $parameters = array(
            'Action' => 'SingleSendMail',
            'AccountName' => $this->AccountName,
            'ReplyToAddress' => $this->ReplyToAddress,
            'AddressType' => (string) $this->AddressType,
            'ToAddress' => $this->ToAddress,
            'FromAlias' => $this->FromAlias,
            'Subject' => $this->Subject,
            'HtmlBody' => $this->HtmlBody
        );
        $this->parameters['Signature'] = $this->makeSign($parameters, Auth::getAccessKeyId());
        $post_data = $this->buildPostData($this->parameters);
        $response = HttpHelper::post(self::$api, $post_data);
        return $response;
    }
}