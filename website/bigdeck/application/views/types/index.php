<div class="row">
    <div class="col col-12">
        <div class="block primary">
            <div class="col full col-12">
                <div class="col full col-sm-8 col-10">
                    <h1 class="title normal">Card Types</h1>
                </div>
                <div class="col full col-sm-4 col-2">
                    <a href="<?php echo base_url('types/insert'); ?>" class="button icon red text small right">
                        <i class="fal fa-plus"></i>
                        New
                    </a>
                </div>
            </div>

            <table class="small text">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
                <?php if ($types) { ?>
                    <?php foreach ($types as $type) { ?>
                        <tr>
                            <td><?php echo $type->id; ?></td>
                            <td><?php echo $type->name; ?></td>
                            <td class="actions">
                                <a href="<?php echo base_url('types/update/' . $type->id); ?>">
                                    <i class="fal fa-pencil edit"></i>
                                </a>
                                <a href="<?php echo base_url('types/delete/' . $type->id); ?>">
                                    <i class="fal fa-trash delete"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="3">No data found...</td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>