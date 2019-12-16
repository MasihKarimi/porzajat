
                                        <style>
                                            #info {
                                                border: 0px solid black !important;
                                                font-size: 15px !important;
                                                color: #6b8eb2;
                                        
                                            }
                                        
                                            .forms tr td {
                                        
                                                border: 1px solid #587593 !important;
                                            }
                                        
                                            #title {
                                                color: #58588a;
                                                font-size: larger;
                                                font-weight: bold;
                                                text-align: center
                                            }
                                        </style>
                                       
                                        <table id="printhr">
                                            <style>
                                                @media  print {
                                                    textarea {
                                                        background-color: rgba(240, 240, 240, 0) !important;
                                                        width: 100% !important;
                                                        font-weight: bold !important;
                                                        color: #0e84b5 !important;
                                                    }
                                        
                                                    #info {
                                                        border: 0px solid black !important;
                                                        font-size: 15px !important;
                                                        color: #6b8eb2;
                                        
                                                    }
                                        
                                                    #printhr td {
                                                        border: 0px solid black !important;
                                                    }
                                        
                                                    #title {
                                                        color: #58588a !important;
                                                        font-size: larger !important;
                                                        font-weight: bold !important;
                                                    }
                                        
                                                    .forms tr td {
                                        
                                                        border: 1px solid #587593 !important;
                                                    }
                                        
                                                    #rights {
                                                        /*float: right!important;*/
                                                    }
                                                }
                                            </style>
                                            <tr>
                                                <td style="width: 40vw !important; text-align: left" colspan="2">
                                                    <span style="color: #58588a;" id="title">  HamidLemar Ltd </span>
                                                    <br>
                                                </td>
                                        
                                                <td style="padding-top: 25px; text-align: center;width: 20%!important;"><img
                                                            src="<?php echo e(URL::asset('assets/image/logo.png')); ?>"
                                                            style="width: auto; margin-top: -10px;" height="70px">
                                                </td>
                                        
                                                <td id="rights" style="width: 40vw !important; text-align: right; " colspan="2">
                                                    <span style="" id="title">HamidLemar Ltd</span>
                                                    <br>
                                                </td>
                                        
                                            </tr>
                                        </table>
                                        <table style="border-bottom: 2px solid #6b8eb2!important;">
                                            <tr>
                                                <td id="info" style="white-space: nowrap !important;"></td>
                                                <td   id="info" style="width: 50%"></td>
                                                <td id="info" style="white-space: nowrap !important;padding-right: 5px !important;"></td>
                                                <td  id="info" style="width: 50%"></td>
                                                
                                                    <td id="info" style="white-space: nowrap !important;">User :
                                                        <?php echo $__env->yieldContent('users'); ?>
                                        
                                                    </td>
                                                
                                            </tr>
                                        </table>