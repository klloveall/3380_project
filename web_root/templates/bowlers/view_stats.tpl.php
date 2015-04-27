<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>

<h1>View Statistics</h1>
<table>
    <tr>
    <?php foreach ($_TEMPLATES['vars']['results'] as $data): ?>
        <?php if ($previous_game != $data['game_id']): ?>
            <?php $previous_game = $data['game_id']; ?>
            </tr>
            <tr>
                <?php foreach ($past_frames as $frame): ?>
                    <?php if ($frame['frame_number'] != 10) : ?>
                        <?php if ($frame['frame_1_pins'] == 10): ?>
                            <td>&nbsp;</td>
                            <td>X</td>
                        <?php elseif ($frame['frame_2_pins'] == 10): ?>
                            <td><?=$frame['frame_1_pins']?></td>
                            <td>/</td>
                        <?php else: ?>
                            <td><?=$frame['frame_1_pins']?></td>
                            <td><?=$frame['frame_2_pins']?></td>
                        <?php endif; ?>
                    <?php else: ?>
                        <td><?= ($frame['frame_1_pins'] == 10 ? 'X' : $frame['frame_1_pins']) ?></td>
                        <td><?= ($frame['frame_2_pins'] == 10 ? ($frame['frame_1_pins'] == 10 ? 'X' : '/') : $frame['frame_2_pins']) ?></td>
                        <td><?= ($frame['frame_3_pins'] == 10 ? ($frame['frame_2_pins'] == 10 ? 'X' : '/') : $frame['frame_3_pins']) ?></td>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tr>
<!--            <tr>
                <?php foreach ($past_frames as $number => $frame): ?>
                    <?php $score += 0?>
                    <td colspan="<?=($frame['frame_number'] != 10 ? '2' : '3')?>"><?=$score?></td>
                <?php endforeach; ?>
            </tr>-->
            </table>
            <table>
                <tr>
                    <td><em>Bowler:</em> <?= $data['bowler_name'] ?></td>
                    <td><em>Center:</em> <?= $data['center_name'] ?> (lane <?= $data['lane'] ?></td>
                    <td><em>Pattern:</em> <?= $data['pattern_name'] ?></td>
                    <td><?= $data['timestamp'] ?></td>
                </tr>
            </table>
            <table>
                <tr>
        <?php endif; ?>
                    <th colspan="<?=($data['frame_number'] != 10 ? '2' : '3')?>"><?=$data['frame_number']?></th>
                    <?php $past_frames[$data['frame_number']] = $data ?>

    <?php endforeach; ?>
    <?php
    require_once $_TEMPLATES['location'] . 'footer.tpl.php';
    ?>