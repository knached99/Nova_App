<!DOCTYPE html>
<html>

<head>
    <title>Nova Music | Create New Release</title>
    <style>
        .multisteps-form__progress {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(0, 1fr));
        }

        .multisteps-form__progress-btn {
            transition-property: all;
            transition-duration: 0.15s;
            transition-timing-function: linear;
            transition-delay: 0s;
            position: relative;
            padding-top: 20px;
            color: rgba(108, 117, 125, 0.7);
            text-indent: -9999px;
            border: none;
            background-color: transparent;
            outline: none !important;
            cursor: pointer;
        }

        @media (min-width: 500px) {
            .multisteps-form__progress-btn {
                text-indent: 0;
            }
        }

        .multisteps-form__progress-btn:before {
            position: absolute;
            top: 0;
            left: 50%;
            display: block;
            width: 13px;
            height: 13px;
            content: '';
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
            transition: all 0.15s linear 0s, -webkit-transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
            transition: all 0.15s linear 0s, transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
            transition: all 0.15s linear 0s, transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s, -webkit-transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
            border: 2px solid currentColor;
            border-radius: 50%;
            background-color: #fff;
            box-sizing: border-box;
            z-index: 3;
        }

        .multisteps-form__progress-btn:after {
            position: absolute;
            top: 5px;
            left: calc(-50% - 13px / 2);
            transition-property: all;
            transition-duration: 0.15s;
            transition-timing-function: linear;
            transition-delay: 0s;
            display: block;
            width: 100%;
            height: 2px;
            content: '';
            background-color: currentColor;
            z-index: 1;
        }

        .multisteps-form__progress-btn:first-child:after {
            display: none;
        }

        .multisteps-form__progress-btn.js-active {
            color: #007bff;
        }

        .multisteps-form__progress-btn.js-active:before {
            -webkit-transform: translateX(-50%) scale(1.2);
            transform: translateX(-50%) scale(1.2);
            background-color: currentColor;
        }

        .multisteps-form__form {
            position: relative;
        }

        .multisteps-form__panel {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 0;
            opacity: 0;
            visibility: hidden;
        }

        .multisteps-form__panel.js-active {
            height: auto;
            opacity: 1;
            visibility: visible;
        }
    </style>

</head>
<body>
    <div class="page-holder bg-gray-100 ">
        <div class="container-fluid px-lg-4 px-xl-5 ">
            <div class="page-header d-flex align-items-center justify-content-center" style="padding-top:200px;">

            <br><br><br><h1 class="page-heading">Create New Release</h1>
            </div>
            <div class="multisteps-form">
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="col-8 col-lg-8 ml-auto mr-auto mb-4">
                        <div class="multisteps-form__progress">
                            <button class="multisteps-form__progress-btn js-active" type="button" title="Release Name">Release Name</button>
                            <button class="multisteps-form__progress-btn" type="button" title="Release Date">Release Date</button>
                            <button class="multisteps-form__progress-btn" type="button" title="Release Genre">Release Genre</button>
                            <button class="multisteps-form__progress-btn" type="button" title="Artwork">Release Type</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 col-lg-10 m-auto multisteps-form__form">
                      <?php
                      echo form_open();
                      ?>
                        <!--<form class="multisteps-form__form" method="POST"> -->
                            <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                                <h3 class="multisteps-form__title">Release Name</h3>
                                <div class="multisteps-form__content">
                                    <div class="form-row mt-4">
                                        <input class="multisteps-form__input form-control form-control-lg" id="release_name" name="release_name" type="text" placeholder="Name Your Release"><br>
                                        <small class="form-text text-muted"><i class="fas fa-check-circle" style="color:orange"></i> This will be the name of your release. You can change this later.</small>

                                        <small class="text-danger"><?php echo form_error('release_name');?></small>

                                    </div>
                                    <div class="button-row d-flex mt-4" style="float:right">
                                        <button class="btn btn-primary btn-lg ml-auto js-btn-next" type="button" style="float:right" title="Next">Next</button>
                                    </div>
                                </div>
                            </div>
                            <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                <h3 class="multisteps-form__title">Release Date</h3>
                                <div class="multisteps-form__content">
                                    <div class="form-row mt-4">
                                    <input class="form-control form-control-lg input-datepicker" type="text" value="" id="release_date" name="release_date" placeholder="Select Release Date"><br>
                                    <small class="form-text text-muted"><i class="fas fa-check-circle" style="color:orange"></i> Please select a date at least 14 days from today. This allows us and the DSPs time to process your release for distribution.</small>

                                    <small class="text-danger"><?php echo form_error('release_date');?></small>

                                    </div>

                                    <div class="button-row d-flex mt-4" style="float:left">
                                        <button class="btn btn-secondary btn-lg js-btn-prev" type="button"  title="Back">Back</button>
                                    </div>
                                    <div class="button-row d-flex mt-4" style="float:right">
                                        <button class="btn btn-primary btn-lg ml-auto js-btn-next" type="button" style="float:right" title="Next">Next</button>
                                    </div>
                                </div>
                            </div>
                            <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                <h3 class="multisteps-form__title">Release Genre</h3>
                                <div class="multisteps-form__content">
                                    <div class="form-row mt-4">
                                    <input list="genres" name="release_genre" id="release_genre" class="form-control form-control-lg" name="release_genre" placeholder="Select Release Genre"><br>
                                    <small class="form-text text-muted"><i class="fas fa-check-circle" style="color:orange"></i> These are all of the recongized genres for most DSPs. If yours is not on the list, please select the closest option.</small><br>

                                    <small class="text-danger"><?php echo form_error('release_genre');?></small>

                                        <datalist id="genres" style="display:none">
                                            <option value="Alternative">
                                            <option value="Blues">
                                            <option value="Classical">
                                            <option value="Country">
                                            <option value="Dance">
                                            <option value="Electronic">
                                            <option value="Hip-Hop/Rap">
                                            <option value="Jazz">
                                            <option value="Latin">
                                            <option value="New Age">
                                            <option value="Pop">
                                            <option value="R&B/Soul">
                                            <option value="Reggae">
                                            <option value="Rock">
                                            <option value="Soundtrack">
                                            <option value="Spoken Word">
                                            <option value="World">
                                        </datalist>
                                    </div>
                                    <div class="button-row d-flex mt-4" style="float:left">
                                        <button class="btn btn-secondary btn-lg js-btn-prev" type="button"  title="Back">Back</button>
                                    </div>
                                    <div class="button-row d-flex mt-4" style="float:right">
                                        <button class="btn btn-primary btn-lg ml-auto js-btn-next" type="button" style="float:right" title="Next">Next</button>
                                    </div>
                                </div>
                            </div>
                            <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                            <h3 class="multisteps-form__title">Release Type</h3>
                                <div class="multisteps-form__content">
                                    <div class="form-row mt-4">
                                    <input list="releasetype" name="release_type" id="release_type" class="form-control form-control-lg" name="release_type" placeholder="Select Release Type">
                                    <small class="text-danger"><?php echo form_error('release_type');?></small><br>
                                    <small class="form-text text-muted"><i class="fas fa-check-circle" style="color:orange"></i> A <b>Single</b> is a release containing one to three songs that are under 10 minutes each.</small><br>
                                     <small class="form-text text-muted"><i class="fas fa-check-circle" style="color:orange"></i> An <b>EP</b> contains four to six songs with a total running time of 30 minutes or less.</small><br>
                                        <small class="form-text text-muted"><i class="fas fa-check-circle" style="color:orange"></i> An <b>Album</b> is a release that contains over 30 minutes of music, a continuous DJ mix, or six different tracks from the same artist.</small>



                                        <datalist id="releasetype" style="display:none">
                                            <option value="Single">
                                            <option value="EP">
                                            <option value="Album">
                                        </datalist>
                                    </div>
                                    <div class="button-row d-flex mt-4" style="float:left">
                                        <button class="btn btn-secondary btn-lg js-btn-prev" type="button"  title="Back">Back</button>
                                    </div>
                                    <div class="button-row d-flex mt-4" style="float:right">
                                    <button class="btn btn-primary btn-lg ml-auto" type="submit" title="Send">Create Release</button>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close();?>
                    </div>
                </div>
        </div>





</body>
<script src="<?php echo base_url();?>vendor/imask/imask.min.js"></script>

<script>
    var element = document.getElementById("release_date");
    if (element) {
        var maskOptions = {
            mask: "00/00/0000",
        };
        var mask = IMask(element, maskOptions);
    }
</script>
<script>
    //DOM elements
    const DOMstrings = {
        stepsBtnClass: 'multisteps-form__progress-btn',
        stepsBtns: document.querySelectorAll(`.multisteps-form__progress-btn`),
        stepsBar: document.querySelector('.multisteps-form__progress'),
        stepsForm: document.querySelector('.multisteps-form__form'),
        stepsFormTextareas: document.querySelectorAll('.multisteps-form__textarea'),
        stepFormPanelClass: 'multisteps-form__panel',
        stepFormPanels: document.querySelectorAll('.multisteps-form__panel'),
        stepPrevBtnClass: 'js-btn-prev',
        stepNextBtnClass: 'js-btn-next'
    };
    //remove class from a set of items
    const removeClasses = (elemSet, className) => {

        elemSet.forEach(elem => {

            elem.classList.remove(className);

        });

    };
    //return exect parent node of the element
    const findParent = (elem, parentClass) => {
        let currentNode = elem;
        while (!currentNode.classList.contains(parentClass)) {
            currentNode = currentNode.parentNode;
        }
        return currentNode;
    };

    //get active button step number
    const getActiveStep = elem => {
        return Array.from(DOMstrings.stepsBtns).indexOf(elem);
    };

    //set all steps before clicked (and clicked too) to active
    const setActiveStep = activeStepNum => {

        //remove active state from all the state
        removeClasses(DOMstrings.stepsBtns, 'js-active');

        //set picked items to active
        DOMstrings.stepsBtns.forEach((elem, index) => {

            if (index <= activeStepNum) {
                elem.classList.add('js-active');
            }

        });
    };

    //get active panel
    const getActivePanel = () => {

        let activePanel;

        DOMstrings.stepFormPanels.forEach(elem => {

            if (elem.classList.contains('js-active')) {

                activePanel = elem;

            }

        });

        return activePanel;

    };

    //open active panel (and close unactive panels)
    const setActivePanel = activePanelNum => {

        //remove active class from all the panels
        removeClasses(DOMstrings.stepFormPanels, 'js-active');

        //show active panel
        DOMstrings.stepFormPanels.forEach((elem, index) => {
            if (index === activePanelNum) {

                elem.classList.add('js-active');

                setFormHeight(elem);

            }
        });

    };

    //set form height equal to current panel height
    const formHeight = activePanel => {

        const activePanelHeight = activePanel.offsetHeight;

        DOMstrings.stepsForm.style.height = `${activePanelHeight}px`;

    };

    const setFormHeight = () => {
        const activePanel = getActivePanel();

        formHeight(activePanel);
    };

    //STEPS BAR CLICK FUNCTION
    DOMstrings.stepsBar.addEventListener('click', e => {

        //check if click target is a step button
        const eventTarget = e.target;

        if (!eventTarget.classList.contains(`${DOMstrings.stepsBtnClass}`)) {
            return;
        }

        //get active button step number
        const activeStep = getActiveStep(eventTarget);

        //set all steps before clicked (and clicked too) to active
        setActiveStep(activeStep);

        //open active panel
        setActivePanel(activeStep);
    });

    //PREV/NEXT BTNS CLICK
    DOMstrings.stepsForm.addEventListener('click', e => {

        const eventTarget = e.target;

        //check if we clicked on `PREV` or NEXT` buttons
        if (!(eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`) || eventTarget.classList.contains(`${DOMstrings.stepNextBtnClass}`))) {
            return;
        }

        //find active panel
        const activePanel = findParent(eventTarget, `${DOMstrings.stepFormPanelClass}`);

        let activePanelNum = Array.from(DOMstrings.stepFormPanels).indexOf(activePanel);

        //set active step and active panel onclick
        if (eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`)) {
            activePanelNum--;

        } else {

            activePanelNum++;

        }

        setActiveStep(activePanelNum);
        setActivePanel(activePanelNum);

    });

    //SETTING PROPER FORM HEIGHT ONLOAD
    window.addEventListener('load', setFormHeight, false);

    //SETTING PROPER FORM HEIGHT ONRESIZE
    window.addEventListener('resize', setFormHeight, false);


</script>


</html>
