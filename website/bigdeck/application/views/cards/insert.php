<div class="row">
    <div class="col col-12">
        <div class="block primary">
            <div class="col full col-12">
                <div class="col full col-sm-8 col-10">
                    <h1 class="title normal">Card Insert</h1>
                </div>
                <div class="col full col-sm-4 col-2">
                    <a href="<?php echo base_url('cards'); ?>" class="button icon green text small right">
                        <i class="fal fa-list"></i>
                        List
                    </a>
                </div>
            </div>

            <form class="row" action="<?php echo base_url('cards/insert'); ?>" enctype="multipart/form-data" method="post">
                <div class="col col-xsm-12 col-sm-12 col-md-6 col-6">
                    <div class="input">
                        <label for="name" class="text small">Name</label>
                        <input type="text" name="name" id="name" class="text small" required>
                    </div>
                </div>
                <div class="col col-xsm-12 col-sm-12 col-md-6 col-6">
                    <div class="input">
                        <label for="cost" class="text small">Cost</label>
                        <input type="text" name="cost" id="cost" class="text small" required>
                    </div>
                </div>
                <div class="col col-xsm-12 col-sm-12 col-md-6 col-6">
                    <div class="input">
                        <label for="rarity_id" class="text small">Rarity</label>
                        <select name="rarity_id" id="rarity_id" class="text small" required>
                            <option value=""></option>
                            <?php foreach($rarities AS $rarity) { ?>
                                <option value="<?php echo $rarity->id; ?>"><?php echo $rarity->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col col-xsm-12 col-sm-12 col-md-6 col-6">
                    <div class="input">
                        <label for="type_id" class="text small">Type</label>
                        <select name="type_id" id="type_id" class="text small" required>
                            <option value=""></option>
                            <?php foreach($types AS $type) { ?>
                                <option value="<?php echo $type->id; ?>"><?php echo $type->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col col-xsm-12 col-sm-12 col-md-6 col-6">
                    <div class="input">
                        <label for="race_id" class="text small">Race</label>
                        <select name="race_id" id="race_id" class="text small" required>
                            <option value=""></option>
                            <?php foreach($races AS $race) { ?>
                                <option value="<?php echo $race->id; ?>"><?php echo $race->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col col-xsm-12 col-sm-12 col-md-6 col-6">
                    <div class="input">
                        <label for="class_id" class="text small">Class</label>
                        <select name="class_id" id="class_id" class="text small" required>
                            <option value=""></option>
                            <?php foreach($classes AS $class) { ?>
                                <option value="<?php echo $class->id; ?>"><?php echo $class->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col col-xsm-12 col-sm-12 col-md-6 col-6">
                    <div class="file">
                        <label for="image">
                            <div class="file-button red text small">Image</div>
                            <div class="file-name text small">Select a file...</div>
                        </label>
                        <input type="file" name="image" id="image" required>
                    </div>
                </div>
                <div class="col col-12">
                    <button type="submit" class="button icon text purple right">
                        <i class="fal fa-check"></i>
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>