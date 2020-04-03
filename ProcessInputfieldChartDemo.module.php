<?php namespace ProcessWire;
// info snippet
class ProcessInputfieldChartDemo extends Process {
  public static function getModuleInfo() {
    return [
      'title' => 'Demo Process Module showing dashboard',
      'version' => '0.0.1',
      'summary' => '',
      'icon' => '',
      'requires' => ['InputfieldChartDemo'],
      'installs' => [],
      
      // page that you want created to execute this module
      'page' => [
        'name' => 'chart-demo',
        'title' => 'Chart-Demo',
        'icon' => 'bar-chart',
      ],

      // optional extra navigation that appears in admin
      // if you change this, you'll need to a Modules > Refresh to see changes
      'nav' => [
        [
          'url' => '',
          'label' => 'Default',
          'icon' => 'smile-o',
        ],[
          'url' => 'grid/',
          'label' => 'Grid',
          'icon' => 'columns',
        ],
      ]
    ];
  }

  /**
   * Default Dashboard
   */
  public function execute() {
    $this->headline('Dashboard');
    $this->browserTitle('Dashboard');
    /** @var InputfieldForm $form */
    $form = $this->modules->get('InputfieldForm');
    
    $form->add([
      'type' => 'ChartDemo',
      'label' => 'This is a demo of InputfieldChartDemo',
      'icon' => 'area-chart',
      'themeBorder' => 'card',
      'themeOffset' => 'm',
    ]);
    
    return $form->render();
  }
  
  /**
   * Grid Dashboard
   */
  public function executeGrid() {
    $this->headline('Dashboard');
    $this->browserTitle('Dashboard');
    /** @var InputfieldForm $form */
    $form = $this->modules->get('InputfieldForm');
    
    $form->add([
      'type' => 'fieldset',
      'label' => 'Process Module Grid Demo',
      'icon' => 'columns',
      'themeBorder' => 'card',
      'children' => [
        [
          'type' => 'ChartDemo',
          'label' => 'Chart1',
          'icon' => 'area-chart',
          'themeBorder' => 'card',
          'themeOffset' => 'm',
          'columnWidth' => 50,
        ],[
          'type' => 'ChartDemo',
          'label' => 'Chart2',
          'icon' => 'area-chart',
          'themeBorder' => 'card',
          'themeOffset' => 'm',
          'columnWidth' => 50,
        ]
      ],
    ]);
    
    return $form->render();
  }
}