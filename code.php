<?php
$eventName = $modx->event->name;
$bsShow = (@$_REQUEST['bs'] == 1) ? true : false;
if ($eventName == 'OnLoadWebDocument' && $bsShow) {


    //js
    $modx->regClientStartupHTMLBlock('
        <script>
            document.addEventListener("DOMContentLoaded", () => {
            console.log("BS pixel load!");
              showGrid(0);
            renderBreakpointHelpers();
          });
        
        function renderBreakpointHelpers() {
            var breakpoint = document.createElement("div");
            breakpoint.innerHTML =`
            <div data-forh-element="breakpoint-helpers" style="display: none;" class="d-block">
              <div data-forh-element="breakpoint-helper" data-helper="xs" class="d-block d-sm-none">XS</div>
              <div data-forh-element="breakpoint-helper" data-helper="sm" class="d-none d-sm-block d-md-none">SM</div>
              <div data-forh-element="breakpoint-helper" data-helper="md" class="d-none d-md-block d-lg-none">MD</div>
              <div data-forh-element="breakpoint-helper" data-helper="lg" class="d-none d-lg-block d-xl-none">LG</div>
              <div data-forh-element="breakpoint-helper" data-helper="xl" class="d-none d-xl-block">XL</div>
            </div>
          `;
            document.body.appendChild(breakpoint);
        }

        function showGrid(isFluid, count) {
            var grid = document.createElement("div");
    let columns = \'\';

    if (!count) {
        count = 12;
    }

    for (let i = 1; i <= count; i++) {
        columns += `
      <div class="col-1 col-sm-1">
        <div>${i}</div>
      </div>
    `;
    }

  grid.innerHTML=`
                 <style>
                    [data-forh-element=\'grid\'] {
                  position: fixed;
                  top: 0;
                  left: 0;
                  z-index: 1000000;
                  width: 100%;
                  height: 100%;
                  pointer-events: none;
                  font-family: \'Open Sans\', Sans-serif;
                }
                
                [data-forh-element=\'grid\'] > .container,
                [data-forh-element=\'grid\'] > .container-fluid,
                [data-forh-element=\'grid\'] > .container > .row,
                [data-forh-element=\'grid\'] > .container-fluid > .row {
                  height: 100%;
                }
                
                [data-forh-element=\'grid\'] [class*=\'col-\'] {
                  position: relative;
                  height: 100%;
                  background-color: rgba(76, 199, 142, 0.2);
                }
                
                [data-forh-element=\'grid\'] [class*=\'col-\'] > div {
                  display: flex;
                  justify-content: center;
                  height: 100%;
                  background-color: rgba(76, 199, 142, 0.2);
                  opacity: 0.5;
                }
                
                [data-forh-element=\'form\'] {
                  position: fixed;
                  bottom: 10px;
                  left: 60px;
                  z-index: 1000001;
                  display: flex;
                  align-items: center;
                  padding: 4px;
                  opacity: 0.15;
                  transition: 0.2s;
                }
                
                [data-forh-element=\'form\'] input {
                  margin: 0.4rem;
                }
                
                [data-forh-element=\'form\'] label {
                  margin-bottom: 0;
                }
                
                [data-forh-element=\'donate\'] {
                  position: fixed;
                  bottom: 10px;
                  right: 10px;
                  z-index: 1000001;
                  opacity: 0.15;
                  transition: 0.2s;
                }
                
                [data-forh-element=\'breakpoint-helpers\'] {
                  position: fixed;
                  bottom: 10px;
                  left: 10px;
                  z-index: 1000001;
                  padding: 5px 10px;
                  transition: 0.2s;
                  background-color: rgb(76, 199, 142);
                  color: #000;
                }
                
                [data-forh-element=\'form\']:hover,
                [data-forh-element=\'donate\']:hover {
                  opacity: 1;
                }
                
                [data-forh-element=\'form\'] input[type=\'number\'] {
                  width: 100px;
                  padding-left: 15px;
                  height: 35px;
                  border: 0;
                  border-radius: 10px;
                  background-color: #eee;
                  appearance: none;
                  font-size: 18px;
                  font-family: \'Open Sans\', Sans-serif;
                }
                
                [data-forh-element=\'form\'] input[type=\'submit\'] {
                  position: absolute;
                  top: 50%;
                  right: 2px;
                  z-index: 2;
                  padding-left: 12px;
                  padding-right: 12px;
                  height: 32px;
                  transform: translateY(-50%);
                  border: 0;
                  background-color: rgb(76, 199, 142);
                  border-radius: 10px;
                  font-size: 12px;
                  line-height: 32px;
                  font-family: \'Open Sans\', Sans-serif;
                }
                
                .opacity-1 {
                  opacity: 1;
                }
                
                </style>
                    <div data-forh-element="grid">
                      <div class="${isFluid ? `container-fluid` : `container`}">
                        <div class="row">
                          ${columns}
                        </div>
                      </div>
                    </div>
                  `;
    document.body.appendChild(grid);
}
       </script>');

}
