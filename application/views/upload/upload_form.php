
<html>
<head>
<title>Upload Form</title>
<style type="text/css">
    /* Override some defaults */

    .container {
        width: 300px;
    }

    /* The white background content wrapper */
    .container > .content {
        background-color: #f0f0f0;
        padding: 20px;
        margin: 50px -20px; 
        -webkit-border-radius: 10px 10px 10px 10px;
        -moz-border-radius: 10px 10px 10px 10px;
        border-radius: 10px 10px 10px 10px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
        -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
        box-shadow: 0 1px 2px rgba(0,0,0,.15);
    }

    .login-form {
        margin-left: 65px;
    }

    legend {
        margin-right: -50px;
        font-weight: bold;
        color: #404040;
    }

        </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="clearfix" style="color:red;">
<?php echo $error;?>
</div>
<?php echo form_open_multipart('upload/do_upload');?>
    <div class="clearfix">
        <?php  ?>
<input type="file" name="userfile" size="20" />
</div>
<br /><br />
<div class="clearfix">
<input type="submit" value="upload" class="btn btn-success" />
</div>
</form>
    </div>
        </div>

</body>
</html>

