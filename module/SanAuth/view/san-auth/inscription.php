<?php
 //module/SanAuth/view/san-auth/register/add.phtml:

 $title = 'Enregistrez vous ';
 $this->headTitle($title);
 ?>
 <h1><?php echo $this->escapeHtml($title); ?></h1>
 <?php
 $form->setAttribute('action', $this->url('serie', array('action' => 'add')));// à modifier
 $form->prepare();

 echo $this->form()->openTag($form);
 echo $this->formHidden($form->get('idUser'));
 echo $this->formHidden($form->get('IsAdmin'));
 echo $this->formRow($form->get('username'));
 echo $this->formRow($form->get('password'));
 echo $this->formSubmit($form->get('submit'));
 echo $this->form()->closeTag();