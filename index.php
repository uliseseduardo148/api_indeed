<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Indeed Jobs</title>
</head>
<body>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Empresa</th>
        <th scope="col">Título</th>
        <th scope="col">Fecha de publicación</th>
        <th scope="col">Lugar</th>
        <th scope="col">Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php
    include('service_job.php');
    // loop through an array of data to populate the table rows
    $jobObject = new ServiceJob();
    $jobsList = $jobObject->createList();
    foreach ($jobsList as $job) {
        ?>
        <tr>
            <td> <?php echo $job->getCompany() ?> </td>
            <td> <?php echo $job->getTitle() ?> </td>
            <td>  <?php echo $job->getDate() ?> </td>
            <td>  <?php echo $job->getPlace() ?> </td>
            <td>
                <button type="button" class="btn btn-info details"
                        info="<?php echo $job->getDescription() ?>">Detalles
                </button>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>

<!-- Modal details -->
<div class="modal fade" id="modal-info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalles de la vacante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="info-job"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal details -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>

<script>
    $('.details').click(function () {
        var info = $(this).attr('info');
        $('#modal-info').modal('show');
        $('#info-job').html(info);
    });
</script>
</body>
</html>
