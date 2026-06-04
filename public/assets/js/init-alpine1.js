function data() {
  function getThemeFromLocalStorage() {
    // if user already changed the theme, use it
    if (window.localStorage.getItem('dark')) {
      return JSON.parse(window.localStorage.getItem('dark'))
    }

    // else return their preferences
    return (
      !!window.matchMedia &&
      window.matchMedia('(prefers-color-scheme: dark)').matches
    )
  }



  return {
    
    isSideMenuOpen: false,
    toggleSideMenu() {
      this.isSideMenuOpen = !this.isSideMenuOpen
    },
    closeSideMenu() {
      this.isSideMenuOpen = false
    },
    isNotificationsMenuOpen: false,
    toggleNotificationsMenu() {
      this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
    },
    closeNotificationsMenu() {
      this.isNotificationsMenuOpen = false
    },
    isButtonProfil: false,
    toggleButtonProfil() {
      this.isButtonProfil = !this.isButtonProfil
    },
    closeProfileMenu() {
      this.isProfileMenuOpen = false
    },
    isPagesBlogOpen: false,
    togglePagesBlog() {
      this.isPagesBlogOpen = !this.isPagesBlogOpen
    },
    isPagesServiceOpen: false,
    togglePagesService() {
      this.isPagesServiceOpen = !this.isPagesServiceOpen
    },
    isPagesProfilOpen: false,
    togglePagesProfil() {
      this.isPagesProfilOpen = !this.isPagesProfilOpen
    },
    isPagesSettingOpen: false,
    togglePagesSetting() {
      this.isPagesSettingOpen = !this.isPagesSettingOpen
    },


  

    // Modal
    isModalOpen: false,
    trapCleanup: null,
    openModal() {
      this.isModalOpen = true
      this.trapCleanup = focusTrap(document.querySelector('#modal'))
    },
    closeModal() {
      this.isModalOpen = false
      this.trapCleanup()
    },
  }
}
