<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actors</title>
    <link rel="stylesheet" href="/css/style.css">

</head>
<body>
    <p><a href="/auth/logout">LOGOUT</a></p>
    <h1>Actors</h1>
    <p>
        <a href="/app/actors">Actors</a> | 
        <a href="/app/films">Films</a> 
    </p>

    <?php if ( isset($_GET['error']) ) : ?>
        <p class="alert"><?php echo $_GET['error']?></p>
    <?php endif; ?>

    <?php if ( isset($_GET['message']) ) : ?>
        <p class="message"><?php echo $_GET['message']?></p>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>FULLNAME</th>
                <th>FILMS</th>
            </tr>
        </thead>
    <?php foreach($actors as $actor) : ?>
        <tr>
            <td><?php echo $actor['actor_id']?></td>
            <td><?php echo $actor['fullname']?></td>
            <td><?php echo $actor['films']?></td>
        </tr>
    <?php endforeach; ?>
    </table>
</body>
</html>