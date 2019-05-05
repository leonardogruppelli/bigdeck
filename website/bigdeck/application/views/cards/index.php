<div class="row">
    <div class="col col-12">
        <div class="block primary">
            <div class="col full col-12">
                <div class="col full col-sm-8 col-10">
                    <h1 class="title normal">Cards</h1>
                </div>
                <div class="col full col-sm-4 col-2">
                    <a href="<?php echo base_url('cards/insert'); ?>" class="button icon red text small right">
                        <i class="fal fa-plus"></i>
                        New
                    </a>
                </div>
            </div>

            <table class="small text">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Cost</th>
                    <th>Rarity</th>
                    <th>Type</th>
                    <th>Race</th>
                    <th>Class</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
                <?php if ($cards) { ?>
                    <?php foreach ($cards as $card) { ?>
                        <tr>
                            <td><?php echo $card->id; ?></td>
                            <td><?php echo $card->name; ?></td>
                            <td><?php echo $card->cost; ?></td>
                            <td><?php echo $card->rarity; ?></td>
                            <td><?php echo $card->type; ?></td>
                            <td><?php echo $card->race; ?></td>
                            <td><?php echo $card->class; ?></td>
                            <td><img src="<?php echo base_url('assets/upload/images/' . $card->image); ?>" alt="<?php echo $card->name; ?>"></td>
                            <td class="actions">
                                <a href="<?php echo base_url('cards/update/' . $card->id); ?>">
                                    <i class="fal fa-pencil edit"></i>
                                </a>
                                <a href="<?php echo base_url('cards/delete/' . $card->id); ?>">
                                    <i class="fal fa-trash delete"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="8">No data found...</td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>