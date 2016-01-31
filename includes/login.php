        <form action="includes/process_login.php" method="post" name="login_form">                      
           <input type="text" name="email" placeholder="Login Email"/>
            <input type="password" 
                             name="password" 
                             id="password" placeholder="Password"/>
            <input type="button" 
                   value="Login" 
                   onclick="formhash(this.form, this.form.password);" /> 
        </form>