<div class="row">
    <div class="col col-12">
        <div class="block primary">
            <div class="col full col-12">
                <div class="col full col-sm-8 col-10">
                    <h1 class="title normal">Card Rarity Insert</h1>
                </div>
                <div class="col full col-sm-4 col-2">
                    <a href="<?php echo base_url('rarities'); ?>" class="button icon green text small right">
                        <i class="fal fa-list"></i>
                        List
                    </a>
                </div>
            </div>

            <form class="row" action="<?php echo base_url('rarities/insert'); ?>" method="post">
                <div class="col col-12">
                    <div class="input">
                        <label for="name" class="text small">Name</label>
                        <input type="text" name="name" id="name" class="text small" required>
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