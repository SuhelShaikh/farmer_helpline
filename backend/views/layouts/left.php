<?php 
	use backend\models\RoleModules;
	use backend\models\Modules;
	use backend\models\UserRole;
    use yii\helpers\Url;
	//$modulesDetails = Modules::getModulesList();
	//echo '<pre>';print_r($modulesDetails);exit;
	//$userRoleId = UserRole::getUserRole(Yii::$app->user->id);
	//$roleModulesDetails = RoleModules::getRoleModulesDetails($userRoleId);
    $url = Url::to(['user/view', 'id' => yii::$app->user->identity->id]);
    $modulesDetails = Modules::getModulesList();
    $path = '/farmer_helpline/backend/web/uploads/user/photo/';
	$createUserLink = '';
	//foreach()
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo $path.yii::$app->user->identity->image; ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?php echo yii::$app->user->identity->first_name.' '.yii::$app->user->identity->last_name; ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
<?php 
use backend\models\EaQuestions;
?>
        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->
		<?php $alertClass = ['label' => 'Create New User','icon' => 'user-plus','url' => ['site/signup']]; ?>	
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    //['label' => 'Menu Yii2', 'options' => ['class' => 'header']],

					['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['site/index']],
                    ['label' => 'Alert', 'icon' => 'bell-o', 'url' => ['alertmaster/index']],
                    ['label' => 'SMS Management', 'icon' => 'envelope-o', 'url' => ['smsmanagement/index']],
                    
                    //$alertClass,
                    ['label' => 'Manage Profile','icon' => 'file-code-o','url' => $url],
                    ['label' => 'Manage Users','icon' => 'file-code-o','url' => ['user/index']],
					/*[
                        'label' => 'Farmer',
                        'icon' => 'users',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Create New Farmer','icon' => 'plus-circle','url' => ['site/farmersignup']],
                            ['label' => 'Unassign Farmers','icon' => 'file-code-o','url' => ['userrelation/unassign']],
                            ['label' => 'Farmer Details','icon' => 'id-card-o','url' => ['userrole/index']],
                            ],
                    ],*/

                    [
                        'label' => 'Farmer',
                        'icon' => 'users',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Manage Farmer','icon' => 'plus-circle','url' => ['farmers/index']],
                            ['label' => 'Unassign Farmers','icon' => 'file-code-o','url' => ['farmers/tag-farmers']],
                            //['label' => 'UnTag Farmers','icon' => 'id-card-o','url' => ['farmers/untag-farmers']],
                            ],
                    ],
                   // ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
					
					['label' => 'Role','icon' => 'user-circle','url' => ['role/index']],
				   // ['label' => 'Role Modules','icon' => 'file-code-o','url' => ['rolemodules/index']],
                    ['label' => 'Question','icon' => 'bullhorn','url' => ['ea-questions/index']],

                    [
                        'label' => 'Expert Advisory ('.EaQuestions::getPendingQuestionCount().')   ',
                        'icon' => 'envelope-open-o',
                        'url' =>  ['ea-answers/index'],
                        /*'items' => [
                            ['label' => 'Response','icon' => 'file-code-o','url' => ['ea-answers/index']],
                            ['label' => 'Pending Response','icon' => 'file-code-o','url' => ['ea-answers/pending']]
                        ]*/
                    ],
                    ['label' => 'Pending Question','icon' => 'question-circle-o','url' => ['ea-answers/pendingquesadmin']],
                    /*['label' => 'Assign Farmers','icon' => 'users','url' => ['userrelation/index']],*/
                    ['label' => 'CMS', 'icon' => 'desktop', 'url' => ['cmspages/index']],
                    ['label' => 'Modules','icon' => 'cubes','url' => ['modules/index']],
                    /*['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],*/
                    /*[
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],*/
                ],
            ]
        ) ?>

    </section>

</aside>
