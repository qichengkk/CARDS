<tr id="<?php echo $car['VIN'] ?>">
    <td>
        <a href="<?= site_url('car/show') ?>/<?php echo $car['VIN'] ?>" class="btn btn-link777">
            <span class="glyphicon glyphicon-search"></span>
        </a>
    </td>
    
    <td>
        <h4>
            <?php echo $car['year'] ?>
            <?php echo $car['make'] ?>
            <?php echo $car['model'] ?>
            <?php echo $car['serie'] ?>

            <?php if ($car['transaction'] == 'sold' && $this->session->userdata('role') != 'Driver') : ?>
            <span class="label label-success">Sold</span>
            <?php elseif ($car['transaction'] == 'in-transit') : ?>
            <span class="label label-info">In-transit</span>
            <?php elseif ($car['transaction'] == 'delivered') : ?>
            <span class="label label-primary">Delivered</span>
            <?php endif ?>
        </h4>

        <p>
            <?php echo $car['VIN'] ?> |
            <?php echo $car['color'] ?> |
            <?php echo number_format($car['mileage'])." km" ?> |
            <?php echo $car['date'] ?>
        </p>

        <?php if (($car['transaction'] == 'sold' || $car['transaction'] == 'in-transit') AND $this->session->userdata('role') == 'Driver') : ?>
        <p>
            <small>CUSTOMER:</small><br/>
            <strong><?php echo $car['client_name']." " ?></strong><br/>
            <?php echo $car['client_address'].", ".$car['client_country']." " ?>
            <?php echo $car['client_phone'] ?>
        </p>
        <?php endif ?>
    </td>
    
    <td class="center">
        <?php echo $car['type'] ?>
    </td>

    <td class="right">
        <h4><?php echo "$".number_format($car['estimated_price'], 2, '.', ',') ?></h4>
    </td>
    
    <td class="right">
        <?php if ($this->session->userdata('role') == 'Driver' && $car['transaction'] == 'sold') : ?>
        <!-- For driver  & sold car only -->
        <a href="<?= site_url('transaction/for_delivery') ?>/<?php echo $car['VIN'] ?>" class="btn btn-primary min-w40">Select</a>
        <?php endif ?>

        <?php if ($this->session->userdata('role') == 'Driver' && $car['transaction'] == 'in-transit') : ?>
        <!-- For driver & in-transit car only -->
        <a href="<?= site_url('transaction/delivered') ?>/<?php echo $car['VIN'] ?>" class="btn btn-danger min-w40">Delivered</a>
        <?php endif ?>

        <?php if ($this->session->userdata('role') == 'Salesman' || $this->session->userdata('role') == 'Manager') :?>
        <!-- For sales & manager only -->
        <div class="dropdown">
            <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <span class="glyphicon glyphicon-option-vertical"></span>
            </button>
            <ul class="dropdown-menu">
                <?php if ($car['transaction'] == 'purchased') : ?>
                <li>
                    <a href="<?= site_url('transaction/sell') ?>/<?php echo $car['VIN'] ?>" >
                        <span class="glyphicon glyphicon-ok"></span> Sell
                    </a>
                </li>

                <li class="divider"></li>
                <?php endif ?>

                <li>
                    <a href="<?= site_url('car/update') ?>/<?php echo $car['VIN'] ?>">
                        <span class="glyphicon glyphicon-pencil"></span> Edit
                    </a>
                </li>

                <li>
                    <a href="<?= site_url('car/delete') ?>?VIN=<?php echo $car['VIN'] ?>" class="delete-link">
                        <span class="glyphicon glyphicon-trash"></span> Delete
                    </a>
                </li>
            </ul>
        </div>
        <?php endif ?>
    </td>
</tr>