<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-1">
            <div class="login-form"><!--login form-->
                <h2>Login to your account</h2>
                <form action="<?php echo base_url() . "login/check" ?>" method="post">
                    <input type="text" name="email" placeholder="Name" />
                    <input type="password" name="pass" placeholder="Email Address" />
                    <span>
                        <input type="checkbox" class="checkbox"> 
                        Keep me signed in
                    </span>
                    <button type="submit" class="btn btn-default">Login</button>
                </form>
            </div><!--/login form-->
        </div>
        <div class="col-sm-1">
            <h2 class="odr">OR</h2>
        </div>
        <div class="col-sm-4">
            <div class="signup-form"><!--sign up form-->
                <h2>New User Signup!</h2>

                <div class="col-lg-10"><span class=""></span> </div>

                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        $suc = $this->session->userdata("success");
                        if ($suc != NULL) {
                            echo "<p class='fa fa-check-circle animated bounce' style='color:green;'> {$suc}</p>";
                            $this->session->unset_userdata("success");
                        }
                        $err = $this->session->userdata("error");
                        if ($err != NULL) {
                            echo "<p class='fa fa-times-circle animated bounce' style='color:red;'> {$err}</p>";
                            $this->session->unset_userdata("error");
                        }
                        ?>
                        <?php
                        $this->load->library('form_validation');
                        echo validation_errors();
                        ?>
                        <?php
                        $this->load->helper("form");
                        $data = array("name" => "myform", "enctype" => "multipart/formdata");
                        echo form_open("Sign_up/create_account", $data);
                        $data = array(
                            "name" => "Name",
                            "id" => "id",
                            "value" => set_value("Name"),
                            "placeholder" => "Name"
                        );
                        echo form_input($data);

                        $data = array(
                            "name" => "phone",
                            "id" => "id",
                            "value" => set_value("phone"),
                            "placeholder" => "phone"
                        );
                        echo form_input($data);

                        $data = array(
                            "name" => "Email",
                            "id" => "id",
                            "class" => "form-control",
                            "value" => set_value("Email"),
                            "placeholder" => "Email Address"
                        );
                        echo form_input($data);

                        echo form_label("Mail");
                        $data = array(
                            'name' => 'gender',
                            'id' => 'gender',
                            'value' => 'm',
                            "class" => "radio-inline",
                        );
                        echo form_radio($data);
                        echo form_label("Female");
                        $data = array(
                            'name' => 'gender',
                            'id' => 'gender',
                            'value' => 'f',
                            "class" => "radio-inline",
                        );

                        echo form_radio($data);

                        $data = array();
                        $data[0] = "Select Unit";
                        foreach ($allcountry as $u) {
                            $data[$u->id] = $u->name;
                        }
                        echo form_dropdown("Country", $data, 0, "class='form-control'");
                        

                        $data = array();
                        $data[0] = "Select Unit";
                        foreach ($city as $u) {
                            $data[$u->id] = $u->name;
                        }
                        echo form_dropdown("city", $data, 0, "class='form-control'");

                        

                        $data = array(
                            "name" => "password",
                            "id" => "id",
                            "class" => "form-control",
                            "value" => set_value("password"),
                            "placeholder" => "password"
                        );
                        echo form_password($data);

                        $data = array(
                            "name" => "passconf",
                            "id" => "id",
                            "class" => "form-control",
                            "value" => set_value("passconf"),
                            "placeholder" => "Password Confirmation"
                        );
                        echo form_password($data);


                        $data = array(
                            "name" => "sub",
                            "id" => "id",
                            "class" => "btn btn-default",
                            "value" => "Save"
                        );
                        echo form_submit($data);
                        $data = array(
                            'name' => 'button',
                            'id' => 'button',
                            "class" => "btn btn-default",
                            'value' => 'true',
                            'type' => 'reset',
                            'content' => 'Reset'
                        );
                        ?>                


                    </div><!--/sign up form-->

                </div>
            </div>
        </div>
    </div>
</div>




