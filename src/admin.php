
        <?php
          extract($_POST);

         // checking for empty input of username or password field
           if ( !$adminid || !$password ) {
               fieldsBlank();
               die();
            }


              if ( !( $file = fopen( "logininformation.txt",
                 "r" ) ) ) {
                print( "<title>Error</title></head>
                   <body>unable to access credential file
                   </body></html>" );
                 die();
              }


             $userVerified = 0;

              // Validation of username and password values

              while ( !feof( $file ) && !$userVerified ) {

                // reading credentials file
                $line = fgets( $file, 255 );

                // trim spaces of each line
                $line = chop( $line );

                // separating username and password details
                $field = explode( ",", $line, 2 );

                 // checking username
               if ( $adminid == $field[ 0 ] ) {
                 $userVerified = 1;

                 // call function checkPassword to verify
                 // user’s password
                 if ( checkPassword( $password, $field )
                     == true )
                        accessGranted( $adminid );
                     else
                        wrongPassword();
                  }
               }

               // close text file
               fclose( $file );

               // call function accessDenied if username has
               // not been verified
               if ( !$userVerified )
                  accessDenied();

            // verify user password and return a boolean
           function checkPassword( $userpassword, $filedata )
           {
              if ( $userpassword == $filedata[ 1 ] )
                 return true;
              else
                 return false;
           }


            // permission grant confirmation message

           function accessGranted( $name )
          {
              echo( "<title>Thank You </title></head>
                <body style = \"font-family: arial;
                font-size: 1em; color: blue\">

                <strong>Permission has been
                granted, $name.<br />
                  </strong><br />

                 ");

                echo"<h1>User Details:</h1><br />";
                $handle = fopen("User-Details.txt", "r");
                while (($line = fgets($handle)) !== false) {
                    echo "$line<br>";
                }
                fclose($handle);




           }

            // print a message indicating password is invalid
          function wrongPassword()
           {
            print( "<title>Access Denied</title></head>
               <body style = \"font-family: arial;
               font-size: 1em; color: red\">
              <strong>You entered an invalid
              password.<br />Access has
               been denied.</strong>" );
          }

           // print a message indicating access has been denied
          function accessDenied()
          {
             print( "<title>Access Denied</title></head>
               <body style = \"font-family: arial;
                font-size: 1em; color: red\">
                <strong>
                You were denied access to the secure area.
                 <br /></strong>" );
          }

           // print a message indicating that fields
           // have been left blank
          function fieldsBlank()
           {
             print( "<title>Access Denied</title></head>
                 <body style = \"font-family: arial;
                 font-size: 1em; color: red\">
                <strong>
                 Please fill in all form fields.
                 <br /></strong>" );
           }
       ?>


