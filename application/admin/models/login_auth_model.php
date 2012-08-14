<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" :
 * <thepixeldeveloper@googlemail.com> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return Mathew Davies
 * ----------------------------------------------------------------------------
 */
 
/**
* redux_auth_model
*/
class Login_auth_model extends CI_Model
{
	/**
	 * Holds an array of tables used in
	 * redux.
	 *
	 * @var string
	 **/
	public $tables = array();
	
	/**
	 * activation code
	 *
	 * @var string
	 **/
	public $activation_code;
	
	/**
	 * forgotten password key
	 *
	 * @var string
	 **/
	public $forgotten_password_code;
	
	/**
	 * new password
	 *
	 * @var string
	 **/
	public $new_password;
	
	/**
	 * Identity
	 *
	 * @var string
	 **/
	public $identity;
	
	public function __construct()
	{
		parent::__construct();
		//$this->load->config('redux_auth');
	//	$this->tables  = $this->config->item('tables');
		//$this->columns = $this->config->item('columns');
	}
	
	/**
	 * Misc functions
	 * 
	 * Hash password : Hashes the password to be stored in the database.
     * Hash password db : This function takes a password and validates it
     * against an entry in the users table.
     * Salt : Generates a random salt value.
	 *
	 * @author Mathew
	 */
	 
	/**
	 * Hashes the password to be stored in the database.
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function hash_password($password = false)
	{
	    $salt_length = $this->config->item('salt_length');
	    
	    if ($password === false)
	    {
	        return false;
	    }
	    
		$salt = $this->salt();
		
		$password = $salt . substr(sha1($salt . $password), 0, -$salt_length);
		
		return $password;		
	}
	
	/**
	 * This function takes a password and validates it
     * against an entry in the users table.
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function hash_password_db($identity = false, $password = false)
	{
	    $identity_column   = $this->config->item('identity');
	    $users_table       = $this->tables['users'];
	    $salt_length       = $this->config->item('salt_length');
	    
	    if ($identity === false || $password === false)
	    {
	        return false;
	    }
	    
	    $query  = $this->db->select('password')
                    	   ->where($identity_column, $identity)
                    	   ->limit(1)
                    	   ->get($users_table);
            
        $result = $query->row();
        
		if ($query->num_rows() !== 1)
		{
		    return false;
	    }
	    
		$salt = substr($result->password, 0, $salt_length);

		$password = $salt . substr(sha1($salt . $password), 0, -$salt_length);
        
		return $password;
	}
	
	/**
	 * Generates a random salt value.
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function salt()
	{
		return substr(md5(uniqid(rand(), true)), 0, $this->config->item('salt_length'));
	}
    
	/**
	 * Activation functions
	 * 
     * Activate : Validates and removes activation code.
     * Deactivae : Updates a users row with an activation code.
	 *
	 * @author Mathew
	 */
	
	/**
	 * activate
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function activate($code = false)
	{
	    $identity_column = $this->config->item('identity');
	    $users_table     = $this->tables['users'];
	     
	    if ($code === false)
	    {
	        return false;
	    }
	  
	    $query = $this->db->select($identity_column)
                	      ->where('activation_code', $code)
                	      ->limit(1)
                	      ->get($users_table);
                	      
		$result = $query->row();
       
		if ($query->num_rows() !== 1)
		{
		    return false;
		}
	    
		$identity = $result->{$identity_column};
		
		$data = array('activation_code' => '');
        
		$this->db->update($users_table, $data, array($identity_column => $identity));
		
		return ($this->db->affected_rows() == 1) ? true : false;
	}
	
	/**
	 * Deactivate
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function deactivate($username = false)
	{
	    $users_table = $this->tables['users'];
	    
	    if ($username === false)
	    {
	        return false;
	    }
	    
		$activation_code = sha1(md5(microtime()));
		$this->activation_code = $activation_code;
		
		$data = array('activation_code' => $activation_code);
        
		$this->db->update($users_table, $data, array('username' => $username));
		
		return ($this->db->affected_rows() == 1) ? true : false;
	}

	/**
	 * change password
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function change_password($identity = false, $old = false, $new = false)
	{
	    $identity_column   = $this->config->item('identity');
	    $users_table       = $this->tables['users'];
	    
	    if ($identity === false || $old === false || $new === false)
	    {
	        return false;
	    }
	    
	    $query  = $this->db->select('password')
                    	   ->where($identity_column, $identity)
                    	   ->limit(1)
                    	   ->get($users_table);
                    	   
	    $result = $query->row();

	    $db_password = $result->password; 
	    $old         = $this->hash_password_db($identity, $old);
	    $new         = $this->hash_password($new);

	    if ($db_password === $old)
	    {
	        $data = array('password' => $new);
	        
	        $this->db->update($users_table, $data, array($identity_column => $identity));
	        
	        return ($this->db->affected_rows() == 1) ? true : false;
	    }
	    
	    return false;
	}
	
	/**
	 * Checks username.
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function username_check($username = false)
	{
	    $users_table = $this->tables['users'];
	    
	    if ($username === false)
	    {
	        return false;
	    }
	    
	    $query = $this->db->select('id')
                           ->where('username', $username)
                           ->limit(1)
                           ->get($users_table);
		
		if ($query->num_rows() == 1)
		{
			return true;
		}
		
		return false;
	}
	
	/**
	 * Checks email.
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function email_check($email = false)
	{
	    $users_table = $this->tables['users'];
	    
	    if ($email === false)
	    {
	        return false;
	    }
	    
		$iden=$this->config->item('identity');
	    $query = $this->db->select('ID')
		->where($iden,$email)
                           ->limit(1)
                           ->get($users_table);
		
		if ($query->num_rows() == 1)
		{
			return true;
		}
		
		return false;
	}
	
	/**
	 * Identity check
	 *
	 * @return void
	 * @author Mathew
	 **/
	protected function identity_check($identity = false)
	{
	    $identity_column ='email_contacto';// $this->config->item('identity');
	    $users_table     = 'empleador';
	    
	    if ($identity === false)
	    {
	        return false;
	    }
	    
	    $query = $this->db->select('ID')
                           ->where($identity_column, $identity)
                           ->limit(1)
                           ->get($users_table);
		
		if ($query->num_rows() == 1)
		{
			return true;
		}
		
		return false;
	}

	/**
	 * Insert a forgotten password key.
	 *
	 * @return void
	 * @author Mathew
	 **/
	
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author Mathew
	 **/

	/**
	 * profile
	 *
	 * @return void
	 * @author Mathew
	 **/

	
	/**
	 * login
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function login($identity = false, $password = false)
	{
	    $identity_column = 'email_contacto';//;$this->config->item('identity');
		
	    $users_table     = 'empleador';
	    
	    if ($identity === false || $password === false || $this->identity_check($identity) == false)
	    {
			
	        return false;
	    }
	    
	    $query = $this->db->select('*')
                    	   ->where($identity_column, $identity)
                    	   ->limit(1)
                    	   ->get($users_table);
	    
        $result = $query->row_array();
         
        if ($query->num_rows() == 1)
        {
           // $password = $this->hash_password_db($identity, $password);
            
            //if (!empty($result->activation_code)) { return false; }
            if($result['estado']=='pendiente'):
   		 return 3;
			 elseif($result['estado']=='bloqueado'):
		 return 4;
			else:
			if ($result['pass'] == $password):
    		  //print_r($result);
			// exit();
			unset($result['descripcion']);
    		    $this->native_session->set_userdata('login_datos',$result);
    		    return true;
    		endif;
			
			endif;
			
        }
        
		return false;		
	}
}
