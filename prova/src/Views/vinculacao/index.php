<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vinculação</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Vinculação</h3>
                <form action="/vinculacao" method="post">
                    <div class="mb-3">
                        <label for="mae" class="form-label">Mãe:</label>
                        <select id="mae" name="mae" class="form-control" required>
                            <?php
                                if($listMae != null){
                                    foreach ($listMae as $mae){
                                        echo "<option value='{$mae['id']}' >{$mae['nome']}</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bebe" class="form-label">Bebê:</label>
                        <select id="bebe" name="bebe" class="form-control" required>
                            <?php
                                if($listBebe != null){
                                    foreach ($listBebe as $bebe){
                                        echo "<option value='{$bebe['id']}' >{$bebe['nome']}</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="medico" class="form-label">Médico:</label>
                        <select id="medico" name="medico" class="form-control" required>
                            <?php
                                if($listMedico != null){
                                    foreach ($listMedico as $medico){
                                        echo "<option value='{$medico['id']}' >{$medico['nome']}</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>