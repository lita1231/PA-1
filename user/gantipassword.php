<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px"></h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Ganti Password</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Ganti Password</h3>
                </div>
                <div class="panel-body">

                    <?php 
                    if(isset($_GET['alert'])){
                        if($_GET['alert'] == "sukses"){
                            echo "<div class='alert alert-success'>Password anda berhasil diganti!</div>";
                        } elseif($_GET['alert'] == "konfirmasi"){
                            echo "<div class='alert alert-warning'>Silahkan konfirmasi untuk mengganti password!</div>";
                        } elseif($_GET['alert'] == "semuafield"){
                            echo "<div class='alert alert-warning'>Semua field harus diisi!</div>";
                        } elseif($_GET['alert'] == "passwordmismatch"){
                            echo "<div class='alert alert-warning'>Password baru dan konfirmasi password tidak cocok!</div>";
                        } elseif($_GET['alert'] == "passwordlama"){
                            echo "<div class='alert alert-warning'>Password lama tidak cocok!</div>";
                        } elseif($_GET['alert'] == "usernotfound"){
                            echo "<div class='alert alert-danger'>Pengguna tidak ditemukan!</div>";
                        }
                    }
                    ?>

                    <!-- Change Password Form -->
                    <form action="gantipassword_act.php" method="post" onsubmit="return confirmGantiPassword()">
                        <div class="form-group">
                            <label for="currentPassword">Password Lama</label>
                            <input name="current_password" type="password" class="form-control" id="currentPassword" required>
                        </div>
                        <div class="form-group">
                            <label for="newPassword">Password Baru</label>
                            <input name="password" type="password" class="form-control" id="newPassword" required>
                        </div>
                        <div class="form-group">
                            <label for="renewPassword">Konfirmasi Password Baru</label>
                            <input name="password_confirmation" type="password" class="form-control" id="renewPassword" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </div>
                        <input type="hidden" name="konfirmasi" id="konfirmasi" value="0">
                    </form>
                    <!-- End Change Password Form -->

                </div>
            </div>
        </div>
    </div>
</div>

<br><br><br><br><br><br><br><br><br><br><br>

<?php include 'footer.php'; ?>

<script type="text/javascript">
    function confirmGantiPassword() {
        var konfirmasi = confirm("Apakah anda yakin ingin mengganti password?");
        if (konfirmasi) {
            document.getElementById('konfirmasi').value = "1";
            return true;
        } else {
            document.getElementById('konfirmasi').value = "0";
            return false;
        }
    }
</script>
