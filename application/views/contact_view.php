<?php echo form_open('contact', $contact_form);?>
<div style="padding: 15px;">
    <table>
        <?php if ($this->session->flashdata('msg')) { ?>
        <tr>
            <td colspan="2"><?php echo $this->session->flashdata('msg');?></td>
        </tr>
        <?php } ?>
        <?php if (form_error('name')) { ?>
        <tr>
            <td colspan="2"><?php echo form_error('name');?></td>
        </tr>
        <?php } ?>
        <tr>
            <td><?php echo form_label($this->config->item('name_label', 'contact').'&nbsp;*', 'name');?></td>
            <?php $name['style'] = "width:325px"; ?>
            <td><?php echo form_input($name);?></td>
        </tr>
        <?php if (form_error('email')) { ?>
        <tr>
            <td colspan="2"><?php echo form_error('email');?></td>
        </tr>
        <?php } ?>
        <tr>
            <td><?php echo form_label($this->config->item('email_label', 'contact').'&nbsp;*', 'email');?></td>
            <?php $email['style'] = "width:325px"; ?>
            <td><?php echo form_input($email);?></td>
        </tr>
        <?php if (form_error('subject')) { ?>
        <tr>
            <td colspan="2"><?php echo form_error('subject');?></td>
        </tr>
        <?php } ?>
        <tr>
            <td><?php echo form_label($this->config->item('subject_label', 'contact').'&nbsp;*', 'subject');?></td>
            <?php $subject['style'] = "width:325px"; ?>
            <td><?php echo form_input($subject);?></td>
        </tr>
        <?php if (form_error('message')) { ?>
        <tr>
            <td colspan="2"><?php echo form_error('message');?></td>
        </tr>
        <?php } ?>
        <tr>
            <td><?php echo form_label($this->config->item('message_label', 'contact').'&nbsp;*', 'message');?></td>
            <?php $message['style'] = "width:325px"; ?>
            <td>
                <?php echo form_textarea($message);?>
                <?php echo form_hidden($token);?>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center"><?php echo form_submit($submit);?></td>
        </tr>
    </table>
</div>
<?php echo form_close();?>