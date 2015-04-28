<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>

<h1>Select Stat Options</h1>

<form action="" method="get">
    NOTE: All fields are optional and all result sets get combined together (and duplicates removed)
    <div id="result_sets">
        <fieldset class="outer_fieldsets" id="0">
            <legend>Result Set 1</legend>
            <fieldset>
                <legend>Bowler(s)</legend>
                <label for="bowler[0]">Bowler:</label>
                <select name="bowler[0]" id="bowler[0]" onchange="(function () {
                            $('select#team\\[0\\]').val('all');
                        })()">
                    <option value="all">All Bowlers</option>
                    <? foreach($_TEMPLATES['vars']['bowlers'] as $bowler): ?>
                    <option value="<?= $bowler['id'] ?>"><?= $bowler['name'] ?></option>
                    <? endforeach; ?>
                </select>
                <? if (isset($_TEMPLATES['vars']['form_errors']['bowler[0]'])): ?>
                <span class="error"><?= $_TEMPLATES['vars']['form_errors']['bowler[0]'] ?></span>
                <? endif; ?>

                OR

                <label for="team[0]">Team:</label>
                <select name="team[0]" id="team[0]" onchange="(function () {
                            $('select#bowler\\[0\\]').val('all');
                        })()">
                    <option value="all">All Teams</option>
                    <? foreach($_TEMPLATES['vars']['teams'] as $team): ?>
                    <option value="<?= $team['id'] ?>"><?= $team['name'] ?></option>
                    <? endforeach; ?>
                </select>
                <? if (isset($_TEMPLATES['vars']['form_errors']['team[0]'])): ?>
                <span class="error"><?= $_TEMPLATES['vars']['form_errors']['team[0]'] ?></span>
                <? endif; ?>
            </fieldset>
            <fieldset>
                <legend>Date/Time Ranges</legend>

                <label for="start_date[0]">Start Date of Date Range (inclusive):</label>
                <input type="date" name="start_date[0]" id="start_date[0]" class="inline" />
                <? if (isset($_TEMPLATES['vars']['form_errors']['start_date[0]'])): ?>
                <span class="error"><?= $_TEMPLATES['vars']['form_errors']['start_date[0]'] ?></span>
                <? endif; ?>

                <label for="end_date[0]">End Date of Date Range (inclusive):</label>
                <input type="date" name="end_date[0]" id="end_date[0]" class="inline" />
                <? if (isset($_TEMPLATES['vars']['form_errors']['end_date[0]'])): ?>
                <span class="error"><?= $_TEMPLATES['vars']['form_errors']['end_date[0]'] ?></span>
                <? endif; ?>
                <br />
                <label for="start_time[0]">Start Time of Time Range (inclusive):</label>
                <input type="time" name="start_time[0]" id="start_time[0]" class="inline" />
                <? if (isset($_TEMPLATES['vars']['form_errors']['start_time[0]'])): ?>
                <span class="error"><?= $_TEMPLATES['vars']['form_errors']['start_time[0]'] ?></span>
                <? endif; ?>

                <label for="end_time[0]">End Time of Time Range (inclusive):</label>
                <input type="time" name="end_time[0]" id="end_time[0]" class="inline" />
                <? if (isset($_TEMPLATES['vars']['form_errors']['end_time[0]'])): ?>
                <span class="error"><?= $_TEMPLATES['vars']['form_errors']['end_time[0]'] ?></span>
                <? endif; ?>
            </fieldset>
            <fieldset>
                <legend>Pins Remaining</legend>
                <p>Pin position number(s) remaining after first ball:</p>
                <div class="pin_layout">
                    <div>
                        <span class="pin">
                            <label for="pin_position[0][1][7]">7</label>
                            <input type="checkbox" 
                                   class="inline"
                                   name="pin_position[0][1][7]"
                                   id="pin_position[0][1][7]"
                                   onchange="(function () {
                                               $('input#pins_left_after_first\\[0\\]').val('');
                                               $('input#pins_1_irrelevant\\[0\\]').prop('checked', false);
                                           })()" />
                        </span>
                        <span class="pin">
                            <label for="pin_position[0][1][8]">8</label>
                            <input type="checkbox"
                                   class="inline"
                                   name="pin_position[0][1][8]"
                                   id="pin_position[0][1][8]"
                                   onchange="(function () {
                                               $('input#pins_left_after_first\\[0\\]').val('');
                                               $('input#pins_1_irrelevant\\[0\\]').prop('checked', false);
                                           })()" />
                        </span>
                        <span class="pin">
                            <label for="pin_position[0][1][9]">9</label>
                            <input type="checkbox"
                                   class="inline"
                                   name="pin_position[0][1][9]" 
                                   id="pin_position[0][1][9]" 
                                   onchange="(function () {
                                               $('input#pins_left_after_first\\[0\\]').val('');
                                               $('input#pins_1_irrelevant\\[0\\]').prop('checked', false);
                                           })()" />
                        </span>
                        <span class="pin">
                            <label for="pin_position[0][1][10]">10</label>
                            <input type="checkbox" 
                                   class="inline" 
                                   name="pin_position[0][1][10]"
                                   id="pin_position[0][1][10]" 
                                   onchange="(function () {
                                               $('input#pins_left_after_first\\[0\\]').val('');
                                               $('input#pins_1_irrelevant\\[0\\]').prop('checked', false);
                                           })()"  />
                        </span>
                    </div>
                    <div>
                        <span class="spacer1">&nbsp;</span>
                        <span class="pin">
                            <label for="pin_position[0][1][4]">4</label>
                            <input type="checkbox"
                                   class="inline" 
                                   name="pin_position[0][1][4]"
                                   id="pin_position[0][1][4]"
                                   onchange="(function () {
                                               $('input#pins_left_after_first\\[0\\]').val('');
                                               $('input#pins_1_irrelevant\\[0\\]').prop('checked', false);
                                           })()" />
                        </span>
                        <span class="pin">
                            <label for="pin_position[0][1][5]">5</label>
                            <input type="checkbox" 
                                   class="inline"
                                   name="pin_position[0][1][5]"
                                   id="pin_position[0][1][5]" 
                                   onchange="(function () {
                                               $('input#pins_left_after_first\\[0\\]').val('');
                                               $('input#pins_1_irrelevant\\[0\\]').prop('checked', false);
                                           })()" />
                        </span>
                        <span class="pin">
                            <label for="pin_position[0][1][6]">6</label>
                            <input type="checkbox" 
                                   class="inline" 
                                   name="pin_position[0][1][6]" 
                                   id="pin_position[0][1][6]"
                                   onchange="(function () {
                                               $('input#pins_left_after_first\\[0\\]').val('');
                                               $('input#pins_1_irrelevant\\[0\\]').prop('checked', false);
                                           })()" />
                        </span>
                        <span class="spacer1">&nbsp;</span>
                    </div>
                    <div>
                        <span class="spacer2">&nbsp;</span>
                        <span class="pin">
                            <label for="pin_position[0][1][2]">2</label>
                            <input type="checkbox" 
                                   class="inline" 
                                   name="pin_position[0][1][2]"
                                   id="pin_position[0][1][2]"
                                   onchange="(function () {
                                               $('input#pins_left_after_first\\[0\\]').val('');
                                               $('input#pins_1_irrelevant\\[0\\]').prop('checked', false);
                                           })()" />
                        </span>
                        <span class="pin">
                            <label for="pin_position[0][1][3]">3</label>
                            <input type="checkbox" 
                                   class="inline" 
                                   name="pin_position[0][1][3]" 
                                   id="pin_position[0][1][3]"
                                   onchange="(function () {
                                               $('input#pins_left_after_first\\[0\\]').val('');
                                               $('input#pins_1_irrelevant\\[0\\]').prop('checked', false);
                                           })()" />
                        </span>
                        <span class="spacer2">&nbsp;</span>
                    </div>
                    <div>
                        <span class="spacer3">&nbsp;</span>
                        <span class="pin">
                            <label for="pin_position[0][1][1]">1</label>
                            <input type="checkbox"
                                   class="inline"
                                   name="pin_position[0][1][1]" 
                                   id="pin_position[0][1][1]"
                                   onchange="(function () {
                                               $('input#pins_left_after_first\\[0\\]').val('');
                                               $('input#pins_1_irrelevant\\[0\\]').prop('checked', false);
                                           })()" />
                        </span>
                        <span class="spacer3">&nbsp;</span>
                    </div>
                </div>

                OR:
                <label for="pins_left_after_first[0]">Number of pins remaining after First Ball:</label>
                <input type="number"
                       name="pins_left_after_first[0]" 
                       id="pins_left_after_first[0]" 
                       min="0"
                       max="10"
                       class="inline"
                       onchange="(function () {
                                   $('input#pin_position\\[0\\]\\[1\\]\\[1\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[1\\]\\[2\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[1\\]\\[3\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[1\\]\\[4\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[1\\]\\[5\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[1\\]\\[6\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[1\\]\\[7\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[1\\]\\[8\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[1\\]\\[9\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[1\\]\\[10\\]').prop('checked', false);
                                   $('input#pins_1_irrelevant\\[0\\]').prop('checked', false);
                               })()" /><br />

                OR: <label for="pins_1_irrelevant[0]">Mark pins as irrelevant:</label>
                <input type="checkbox" 
                       class="inline" 
                       name="pins_1_irrelevant[0]" 
                       id="pins_1_irrelevant[0]"
                       checked="checked" 
                       onchange="(function () {
                                   $('input#pin_position\\[0\\]\\[1\\]\\[1\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[1\\]\\[2\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[1\\]\\[3\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[1\\]\\[4\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[1\\]\\[5\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[1\\]\\[6\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[1\\]\\[7\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[1\\]\\[8\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[1\\]\\[9\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[1\\]\\[10\\]').prop('checked', false);
                                   $('input#pins_left_after_first\\[0\\]').val('');
                               })()
                       " />
                <p> Pin position number(s) remaining after second ball: </p>
                <div class ="pin_layout">
                    <div>
                        <span class="pin">
                            <label for="pin_position[0][2][7]">7</label>
                            <input type="checkbox"
                                   class="inline"
                                   name="pin_position[0][2][7]"
                                   id="pin_position[0][2][7]"
                                   onchange="(function () {
                                               $('input#pins_left_after_second\\[0\\]').val('');
                                               $('input#pins_2_irrelevant\\[0\\]').prop('checked', false);
                                           })()"  />
                        </span>
                        <span class="pin">
                            <label for="pin_position[0][2][8]">8</label>
                            <input type="checkbox"
                                   class="inline"
                                   name="pin_position[0][2][8]"
                                   id="pin_position[0][2][8]"
                                   onchange="(function () {
                                               $('input#pins_left_after_second\\[0\\]').val('');
                                               $('input#pins_2_irrelevant\\[0\\]').prop('checked', false);
                                           })()" />
                        </span>
                        <span class="pin">
                            <label for="pin_position[0][2][9]">9</label>
                            <input type="checkbox"
                                   class="inline"
                                   name="pin_position[0][2][9]"
                                   id="pin_position[0][2][9]"
                                   onchange="(function () {
                                               $('input#pins_left_after_second\\[0\\]').val('');
                                               $('input#pins_2_irrelevant\\[0\\]').prop('checked', false);
                                           })()" />
                        </span>
                        <span class="pin">
                            <label for="pin_position[0][2][10]">10</label>
                            <input type="checkbox"
                                   class="inline"
                                   name="pin_position[0][2][10]"
                                   id="pin_position[0][2][10]" 
                                   onchange="(function () {
                                               $('input#pins_left_after_second\\[0\\]').val('');
                                               $('input#pins_2_irrelevant\\[0\\]').prop('checked', false);
                                           })()" />
                        </span>
                    </div>
                    <div>
                        <span class="spacer1">&nbsp;</span>
                        <span class="pin">
                            <label for="pin_position[0][2][4]">4</label>
                            <input type="checkbox"
                                   class="inline"
                                   name="pin_position[0][2][4]"
                                   id="pin_position[0][2][4]"
                                   onchange="(function () {
                                               $('input#pins_left_after_second\\[0\\]').val('');
                                               $('input#pins_2_irrelevant\\[0\\]').prop('checked', false);
                                           })()" />
                        </span>
                        <span class="pin">
                            <label for="pin_position[0][2][5]">5</label>
                            <input type="checkbox"
                                   class="inline"
                                   name="pin_position[0][2][5]"
                                   id="pin_position[0][2][5]"
                                   onchange="(function () {
                                               $('input#pins_left_after_second\\[0\\]').val('');
                                               $('input#pins_2_irrelevant\\[0\\]').prop('checked', false);
                                           })()" />
                        </span>
                        <span class="pin">
                            <label for="pin_position[0][2][6]">6</label>
                            <input type="checkbox"
                                   class="inline"
                                   name="pin_position[0][2][6]"
                                   id="pin_position[0][2][6]"
                                   onchange="(function () {
                                               $('input#pins_left_after_second\\[0\\]').val('');
                                               $('input#pins_2_irrelevant\\[0\\]').prop('checked', false);
                                           })()" />
                        </span>
                        <span class="spacer1">&nbsp;</span>
                    </div>
                    <div>
                        <span class="spacer2">&nbsp;</span>
                        <span class="pin">
                            <label for="pin_position[0][2][2]">2</label>
                            <input type="checkbox"
                                   class="inline"
                                   name="pin_position[0][2][2]"
                                   id="pin_position[0][2][2]"
                                   onchange="(function () {
                                               $('input#pins_left_after_second\\[0\\]').val('');
                                               $('input#pins_2_irrelevant\\[0\\]').prop('checked', false);
                                           })()" />
                        </span>
                        <span class="pin">
                            <label for="pin_position[0][2][5]">5</label>
                            <input type="checkbox"
                                   class="inline"
                                   name="pin_position[0][2][5]"
                                   id="pin_position[0][2][5]"
                                   onchange="(function () {
                                               $('input#pins_left_after_second\\[0\\]').val('');
                                               $('input#pins_2_irrelevant\\[0\\]').prop('checked', false);
                                           })()" />
                        </span>
                        <span class="spacer2">&nbsp;</span>
                    </div>
                    <div>
                        <span class="spacer3">&nbsp;</span>
                        <span class="pin">
                            <label for="pin_position[0][2][1]">1</label>
                            <input type="checkbox"
                                   class="inline"
                                   name="pin_position[0][2][1]"
                                   id="pin_position[0][2][1]"
                                   onchange="(function () {
                                               $('input#pins_left_after_second\\[0\\]').val('');
                                               $('input#pins_2_irrelevant\\[0\\]').prop('checked', false);
                                           })()" />
                        </span>
                        <span class="spacer3">&nbsp;</span>
                    </div>
                </div>

                OR:
                <label for="pins_left_after_second[0]">Number of pins remaining after Second Ball:</label>
                <input type="number"
                       name="pins_left_after_second[0]"
                       id="pins_left_after_second[0]"
                       min="0"
                       max="10"
                       class="inline"
                       onchange="(function () {
                                   $('input#pin_position\\[0\\]\\[2\\]\\[1\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[2\\]\\[2\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[2\\]\\[3\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[2\\]\\[4\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[2\\]\\[5\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[2\\]\\[6\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[2\\]\\[7\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[2\\]\\[8\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[2\\]\\[9\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[2\\]\\[10\\]').prop('checked', false);
                                   $('input#pins_2_irrelevant\\[0\\]').prop('checked', false);
                               })()" /><br />

                OR: <label for="pins_2_irrelevant[0]">Mark pins as irrelevant:</label>
                <input type="checkbox"
                       class="inline" 
                       name="pins_2_irrelevant[0]"
                       id="pins_2_irrelevant[0]"
                       checked="checked"
                       onchange="(function () {
                                   $('input#pin_position\\[0\\]\\[2\\]\\[1\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[2\\]\\[2\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[2\\]\\[3\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[2\\]\\[4\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[2\\]\\[5\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[2\\]\\[6\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[2\\]\\[7\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[2\\]\\[8\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[2\\]\\[9\\]').prop('checked', false);
                                   $('input#pin_position\\[0\\]\\[2\\]\\[10\\]').prop('checked', false);
                                   $('input#pins_left_after_second\\[0\\]').val('');
                               })()
                       " />
            </fieldset>
            <fieldset>
                <legend>Frames</legend>
                <p>Frames in games:</p>
                <span class="pin">
                    <label for="frames[0][1]">1</label>
                    <input type="checkbox" 
                           class="inline"
                           name="frames[0][1]"
                           id="frames[0][1]"
                           value ="1"
                           onchange="(function () {
                                       $('input#frames\\[0\\]\\[na\\]').prop('checked', false);
                                   })()" />
                </span>
                <span class="pin">
                    <label for="frames[0][2]">2</label>
                    <input type="checkbox"
                           class="inline"
                           name="frames[0][2]"
                           id="frames[0][2]"
                           value ="2"
                           onchange="(function () {
                                       $('input#frames\\[0\\]\\[na\\]').prop('checked', false);
                                   })()" />
                </span>
                <span class="pin">
                    <label for="frames[0][3]">3</label>
                    <input type="checkbox"
                           class="inline"
                           name="frames[0][3]"
                           id="frames[0][3]"
                           value ="3"
                           onchange="(function () {
                                       $('input#frames\\[0\\]\\[na\\]').prop('checked', false);
                                   })()" />
                </span>
                <span class="pin">
                    <label for="frames[0][4]">4</label>
                    <input type="checkbox"
                           class="inline"
                           name="frames[0][4]"
                           id="frames[0][4]"
                           value ="4"
                           onchange="(function () {
                                       $('input#frames\\[0\\]\\[na\\]').prop('checked', false);
                                   })()" />
                </span>
                <span class="pin">
                    <label for="frames[0][5]">5</label>
                    <input type="checkbox"
                           class="inline"
                           name="frames[0][5]"
                           id="frames[0][5]"
                           value ="5"
                           onchange="(function () {
                                       $('input#frames\\[0\\]\\[na\\]').prop('checked', false);
                                   })()" />
                </span>
                <span class="pin">
                    <label for="frames[0][6]">6</label>
                    <input type="checkbox"
                           class="inline"
                           name="frames[0][6]"
                           id="frames[0][6]"
                           value ="6"
                           onchange="(function () {
                                       $('input#frames\\[0\\]\\[na\\]').prop('checked', false);
                                   })()" />
                </span>
                <span class="pin">
                    <label for="frames[0][7]">7</label>
                    <input type="checkbox"
                           class="inline"
                           name="frames[0][7]"
                           id="frames[0][7]"
                           value ="7"
                           onchange="(function () {
                                       $('input#frames\\[0\\]\\[na\\]').prop('checked', false);
                                   })()" />
                </span>
                <span class="pin">
                    <label for="frames[0][8]">8</label>
                    <input type="checkbox"
                           class="inline"
                           name="frames[0][8]"
                           id="frames[0][8]"
                           value ="8"
                           onchange="(function () {
                                       $('input#frames\\[0\\]\\[na\\]').prop('checked', false);
                                   })()" />
                </span>
                <span class="pin">
                    <label for="frames[0][9]">9</label>
                    <input type="checkbox"
                           class="inline"
                           name="frames[0][9]"
                           id="frames[0][9]"
                           value ="9"
                           onchange="(function () {
                                       $('input#frames\\[0\\]\\[na\\]').prop('checked', false);
                                   })()" />
                </span>
                <span class="pin">
                    <label for="frames[0][10]">10</label>
                    <input type="checkbox"
                           class="inline"
                           name="frames[0][10]"
                           id="frames[0][10]"
                           value ="10"
                           onchange="(function () {
                                       $('input#frames\\[0\\]\\[na\\]').prop('checked', false);
                                   })()" />
                </span>
                <span class="pin">
                    <label for="frames[0][na]">N/A</label>
                    <input type="checkbox"
                           class="inline"
                           name="frames[0][na]"
                           id="frames[0][na]"
                           checked="checked"
                           onchange="(function () {
                                       $('input#frames\\[0\\]\\[1\\]').prop('checked', false);
                                       $('input#frames\\[0\\]\\[2\\]').prop('checked', false);
                                       $('input#frames\\[0\\]\\[3\\]').prop('checked', false);
                                       $('input#frames\\[0\\]\\[4\\]').prop('checked', false);
                                       $('input#frames\\[0\\]\\[5\\]').prop('checked', false);
                                       $('input#frames\\[0\\]\\[6\\]').prop('checked', false);
                                       $('input#frames\\[0\\]\\[7\\]').prop('checked', false);
                                       $('input#frames\\[0\\]\\[8\\]').prop('checked', false);
                                       $('input#frames\\[0\\]\\[9\\]').prop('checked', false);
                                       $('input#frames\\[0\\]\\[10\\]').prop('checked', false);
                                   })()"/>
                </span>
            </fieldset>
            <fieldset>
                <legend>Bowling Center</legend>
                <label for="bowling_center[0]">Bowling Center</label>
                <select name="bowling_center[0]" id="bowling_center[0]">
                    <option value="all">All Bowling Centers</option>
                    <? foreach($_TEMPLATES['vars']['bowling_centers'] as $center): ?>
                    <option value="<?= $center['id'] ?>"><?= $center['name'] ?></option>
                    <? endforeach; ?>
                </select>
            </fieldset>
            <fieldset>
                <legend>Bowling Ball</legend>
                <label for="bowling_ball[0]">Bowling Ball</label>
                <select name="bowling_ball[0]" id="bowling_ball[0]">
                    <option value="all">All Bowling Balls</option>
                    <? foreach($_TEMPLATES['vars']['bowling_balls'] as $ball): ?>
                    <option value="<?= $ball['id'] ?>"><?= $ball['name'] ?></option>
                    <? endforeach; ?>
                </select>
            </fieldset>
        </fieldset>
    </div>
    <input type="button" value="Add Another Result Set" onclick="(function () {
                $('div#result_sets')
                        .append(
                            $('fieldset.outer_fieldsets')
                            .first()
                            .clone(false)
                            .attr(
                                'id',
                                parseInt($('fieldset.outer_fieldsets')
                                        .last()
                                        .attr('id')) + 1)
                            .prop('outerHTML')
                            .replace(
                                /(1)?0/g,
                                function($0, $1){
                                    return $1 ? $0 : 
                                    parseInt($('fieldset.outer_fieldsets')
                                            .last()
                                            .attr('id')) + 1
                                })
                            .replace(/Result Set 1/,
                                'Result Set ' 
                                        + (parseInt($('fieldset.outer_fieldsets')
                                            .last()
                                            .attr('id')) + 2))
                    );
            })()"/>
    <input type="submit" name="submit" value="Search for Statistics" />
</form>

<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>