<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * facebook library - Facebook sdk intration library
 * we intregrated the facebook SDK version 5.0 from facebook SDK
 * creating in CI style
 * 
 * @author Suphanut Thanyaboon <suphanut@gmail.com>
 * 
 *
 */

require_once APPPATH . "libraries/Facebook/autoload.php";

class Facebook
{

    var $ci;
    public $fb ;
    public $access_token ;

    public function __construct()
    {
        $this->ci =& get_instance();
        //$this->facebookInit();
    }



    /**
     * Initial function for facebook connection 
     * we get facebook configuration from CI facebook.php
     * @return : facebook instant object
     */
    public function facebookInit() {

        $this->fb = new Facebook\Facebook([
                                        'app_id'                => $this->ci->config->item('api_id','facebook'),
                                        'app_secret'            => $this->ci->config->item('app_secret','facebook'),
                                        'default_graph_version' => 'v2.5',
                                        ]); 
        return $this->fb ;                        
    }

    //function to get login url for your app . Just create a controller which     handles redirects after facebook login 

    public function loginUrl($return_url) {

        $helper = $this->facebookInit()->getRedirectLoginHelper();
        $permissions = ['email','user_friends']; // Optional permissions

        $loginUrl = $helper->getLoginUrl(site_url().$return_url, $permissions);
        //echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
        return $loginUrl;


    }


    public function loginUrlCallback() {

        $fb = $this->facebookInit();

        $helper = $fb->getRedirectLoginHelper();

        try {
        $accessToken = $helper->getAccessToken();
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
        }

        if (! isset($accessToken)) {
        if ($helper->getError()) {
            header('HTTP/1.0 401 Unauthorized');
            echo "Error: " . $helper->getError() . "\n";
            echo "Error Code: " . $helper->getErrorCode() . "\n";
            echo "Error Reason: " . $helper->getErrorReason() . "\n";
            echo "Error Description: " . $helper->getErrorDescription() . "\n";
        } else {
            header('HTTP/1.0 400 Bad Request');
            echo 'Bad request';
        }
        exit;
        }

        // Logged in
        //echo '<h3>Access Token</h3>';
        //var_dump($accessToken->getValue());

        // The OAuth 2.0 client handler helps us manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();

        // Get the access token metadata from /debug_token
        $tokenMetadata = $oAuth2Client->debugToken($accessToken);
        //echo '<h3>Metadata</h3>';
        //var_dump($tokenMetadata);

        // Validation (these will throw FacebookSDKException's when they fail)
        $tokenMetadata->validateAppId($this->ci->config->item('api_id','facebook'));
        // If you know the user ID this access token belongs to, you can validate it here
        //$tokenMetadata->validateUserId('123');
        $tokenMetadata->validateExpiration();

        if (! $accessToken->isLongLived()) {
        // Exchanges a short-lived access token for a long-lived one
        try {
            $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
            exit;
        }

        //echo '<h3>Long-lived</h3>';
        //var_dump($accessToken->getValue());
        }

        $this->ci->session->set_userdata('fb_access_token', (string) $accessToken);

        // User is logged in with a long-lived access token.
        // You can redirect them to a members-only page.
        //header('Location: https://example.com/members.php');
   }
        
    /**
     * Retrieve User Profile via the Graph API
     * @return : graph user
     */

    public function fbUserProfile() {

        $fb = $this->facebookInit();

        try {
            // Returns a `Facebook\FacebookResponse` object
            $response = $fb->get('/me?fields=id,name,picture', $this->ci->session->userdata('fb_access_token'));
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            echo $this->ci->session->userdata('fb_access_token');
            $this->loginUrl('/home');
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {

        echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        } 

        //$user = $response->getGraphUser();
        $user = $response->getGraphNode();
        //echo "<pre>";
        //print_r($user);
        //echo $user['name']."<br>";
        //echo $user['picture']['url'];
        //echo "</pre>";

        return $user;
    }

}
