$(document).ready(()=>{
    $('#register-form').on('submit',(e)=>{
    	let _input = $('#register-form').find('input')
    	_alert = false,
    	_pass = $('#register-form').find('.password');
    	_repass = $('#register-form').find('.repassword');
    	_input.map((k,v)=>{
    		if( $(v).val() === '' )
    		{
    			_alert = true
    		}
    	})
    	if( _alert )
    		alert('Please enter your information!')
    	if( _pass.val() !== _repass.val() )
    		alert('Confirm password not match!')
    	else
    		$('#register-form').submit();
    })
});