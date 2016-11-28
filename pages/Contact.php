<?php
/**
 * Template Name: Contact Page
 * Description: A Page Template for the Contact Page
 */
get_header(); ?>

<div class="content">

<h2 class="page__title"><?php echo get_the_title(); ?></h2>

<?php if ( has_post_thumbnail() ) {
    the_post_thumbnail();}
    else {
  }?>

<form class="form" method="post" name="contact" novalidate="novalidate">
  <div class="form__intro">
    <?php the_content(); ?>
  </div>
  <fieldset>
    <div class="form__name">
      <label class="form__name__label" for="name">Name</label>
      <input class="form__name__input" name="name" type="text"/>
    </div>

    <div class="form__email">
      <label class="form__email__label" for="email">Email</label>
      <input class="form__email__input" name="email" type="text"/>
    </div>

    <div class="form__reason">
      <label class="form__reason__label" for="reason">Reason For Contacting</label>
      <select class="form__reason__select" name="reason">
        <option value=""> </option>
        <option value="Book A Family / Lifestyle Package">Book A Family / Lifestlye Package</option>
        <option value="Book A Wedding Package">Book A Wedding Package</option>
        <option value="General Inquiry / Question">General Inquiry / Question</option>
      </select>
    </div>

    <div class="form__date">
      <label class="form__date__label" for="date">Event Date <span>(Optional)</span></label>
      <input class="form__date__datepicker" name="date" type="text"/>
    </div>

    <div class="form__message">
      <label class="form__message__label" for="message">Message</label>
      <textarea class="form__message__textarea" name="message" type="text"></textarea>
    </div>

    <div class="form__bot">
      <label class="form__bot__label" for="bot">Spam Filter (Leave Blank)</label>
      <input class="form__bot__input" name="bot" type="text"/>
    </div>

    <input class="form__submit btn" name="submit" type="submit" value="Send" />
  </fieldset>
  <div class="form__success">
      Message sent successfully!
    </div>
    <div class="form__error">
      Error, please try again.
    </div>
</form>
</div><!-- content-->
<?php get_footer(); ?>
