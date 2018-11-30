<?php 
	use backend\models\RoleModules;
	use backend\models\Modules;
	use backend\models\UserRole;
	//$modulesDetails = Modules::getModulesList();
	//echo '<pre>';print_r($modulesDetails);exit;
	//$userRoleId = UserRole::getUserRole(Yii::$app->user->id);
	//$roleModulesDetails = RoleModules::getRoleModulesDetails($userRoleId);
	$createUserLink = '';
	//foreach()
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>User Name</p>

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
                    ['label' => 'CMS', 'icon' => 'desktop', 'url' => ['cmspages/index']],
                   // ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
					$alertClass,
					['label' => 'Create New Farmer','icon' => 'plus-circle','url' => ['site/farmersignup']],
                    ['label' => 'Farmer Details','icon' => 'id-card-o','url' => ['userrole/index']],
					['label' => 'Role','icon' => 'user-circle','url' => ['role/index']],
					['label' => 'Modules','icon' => 'cubes','url' => ['modules/index']],
				   // ['label' => 'Role Modules','icon' => 'file-code-o','url' => ['rolemodules/index']],
                    ['label' => 'Question','icon' => 'bullhorn','url' => ['ea-questions/index']],

                    [
                        'label' => 'Response ('.EaQuestions::getPendingQuestionCount().')   ',
                        'icon' => 'envelope-open-o',
                        'url' =>  ['ea-answers/index'],
                        /*'items' => [
                            ['label' => 'Response','icon' => 'file-code-o','url' => ['ea-answers/index']],
                            ['label' => 'Pending Response','icon' => 'file-code-o','url' => ['ea-answers/pending']]
                        ]*/
                    ],
                    ['label' => 'Pending Question','icon' => 'question-circle-o','url' => ['ea-answers/pendingquesadmin']],
                    ['label' => 'Create New User','icon' => 'user-plus','url' => ['site/signup']],
                    ['label' => 'Assign Farmers','icon' => 'users','url' => ['userrelation/index']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
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
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
