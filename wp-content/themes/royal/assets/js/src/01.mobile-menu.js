$.mobileMenu = function () {
  $('ul.menu li.menu-item-has-children').each(function () {
    var menuItem = $(this)
    var menuToggle = $('<span class="menu-item-toggle"><span></span></span>')

    menuToggle.insertAfter(menuItem.find('> a'))
      .on('click', function () {
        menuItem.toggleClass('menu-item-expand')
      })
  })
}
