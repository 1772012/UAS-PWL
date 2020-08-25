<?php
/**
 * @author 1772012 - Kafka Febianto Agiharta
 */
?>

<!--Input Form-->
<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
    <fieldset>
        <legend>New Portfolio</legend>

        <div class="form-group">
            <label for="txtNameIdx">Name</label>
            <input type="text" class="form-control" id="txtNameIdx"
                   autofocus required name="txtName">
        </div>

        <div class="form-group">
            <label for="txtUserIdIdx">User ID</label>
            <input type="text" class="form-control" id="txtUserIdIdx"
                   autofocus required name="txtUserId">
        </div>

        <div class="form-group">
            <label for="txtLevelIdx">Level</label>
            <select class="custom-select" name="txtLevel" id="txtLevelIdx">
                <option value="Internasional">Internasional</option>
                <option value="Nasional">Nasional</option>
                <option value="Lokal">Lokal</option>
            </select>
        </div>

        <div class="form-group">
            <label for="txtTypeIdx">Tipe</label>
            <select class="custom-select" name="txtType" id="txtTypeIdx">
                <option value="Akademik">Akademik</option>
                <option value="Penelitian">Penelitian</option>
                <option value="Pengabdian Masyarakat">Pengabdian Masyarakat</option>
                <option value="Minat 7 Bakat">Minat 7 Bakat</option>
            </select>
        </div>

        <div class="form-group">
            <label for="txtParticipationIdx">Partisipasi</label>
            <select class="custom-select" name="txtParticipation" id="txtParticipationIdx">
                <option value="Panitia">Panitia</option>
                <option value="Peserta">Peserta</option>
                <option value="Penulis">Penulis</option>
                <option value="Finalis">Finalis</option>
                <option value="Juara">Juara</option>
            </select>
        </div>

        <div class="form-group">
            <label for="txtDescriptionIdx">Description</label>
            <input type="text" class="form-control" id="txtDescriptionIdx"
                   autofocus required name="txtDescription">
        </div>

        <div class="form-group">
            <label for="txtCertificateIdx" class="custom-file">Certificate</label>
            <input type="file" class="custom-file" id="txtCertificateIdx"
                   name="txtCertificate">
        </div>

        <div class="form-group">
            <input type="submit" name="btnSubmit" value="Add Book" class="btn btn-primary">
        </div>

    </fieldset>
</form>

<!--Data Table view-->
<table id="portfolioTable" class="display">

    <!--    Table Header-->
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Department</th>
        <th>Portfolio Name</th>
        <th>Portfolio Level</th>
        <th>Portfolio Type</th>
        <th>Portfolio Participation</th>
        <th>Certificate</th>
        <th>Action</th>
    </tr>
    </thead>

    <!--    Table Content-->
    <tbody>
    <?php
    foreach ($portfolios as $portfolio) {
        echo '<tr>';
        echo '<td>' . $portfolio->user->id . '</td>';
        echo '<td>' . $portfolio->user->first_name . ' ' . $portfolio->user->last_name . '</td>';
        echo '<td>' . $portfolio->department . '</td>';
        echo '<td>' . $portfolio->level . '</td>';
        echo '<td>' . $portfolio->type . '</td>';
        echo '<td>' . $portfolio->participation . '</td>';
        echo '<td>' . $portfolio->certificate . '</td><br>';
        echo '<td>
                <button onclick="deletePortfolioValue(\'' . $portfolio->name . '\')" type="button" class="btn btn-danger">Delete</button>
              </td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>

<script>
    function deletePortfolioValue(name) {
        let confirmation = window.confirm("are you sure want to delete?");
        if (confirmation) {
            window.location = "?menu=portfolio&cmd=delete&name=" + name;
        }
    }
</script>