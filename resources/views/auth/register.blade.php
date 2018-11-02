<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" type="image/png" href="/img/favicon.png"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>Butter Finger</title>
    </head>
    <body>

        <div class="container">
            <form action="/register/update" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="Name">Username</label>
                    <input type="text" name="name" placeholder="Username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Email">Email address</label>
                    <input type="email" name="email" class="form-control" id="Email" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" name="password" class="form-control" id="Password" placeholder="Password">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <em>Already a member? <a href="/" class="badge badge-info">Click Here.</a></em>
            </form>
        </div>
    </body>
</html>
