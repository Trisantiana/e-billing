<div id="content">
    <header>
        <h2 class="title">Form Input Tarif</h2>
    </header>

        <div class="content-inner">
            <div class="form-wrapper">
                <form action="starif.php?aksi=add" method="post">
                    <div class="form-group">
                        <label class="sr-only">Daya</label>
                        <input type="text" name="daya" required class="form-control" placeholder="Daya">
                    </div>

                     <div class="form-group">
                        <label class="sr-only">Tarif PerKwh</label>
                        <input type="text" name="tarif_perkwh" required class="form-control" placeholder="Tarif PerKwh">
                    </div>

                    <div class="clearfix">
                        <input type="submit" name="btnsimpan" class="btn btn-primary pull-right" value="Simpan">
                    </div>
                </form>
                <p>Nb : Lengkapi isian dengan angka</p>
            </div>
        </div>
</div>
