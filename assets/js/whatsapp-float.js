(() => {
  const modal = document.getElementById('wa-modal');
  const openButtons = [...document.querySelectorAll('[data-wa-open]')];

  if (!modal || !openButtons.length) {
    return;
  }

  const closeButtons = [...modal.querySelectorAll('[data-wa-close]')];
  const closeButton = modal.querySelector('.wa-modal-close');
  const qrImage = modal.querySelector('[data-wa-qr]');
  let lastTrigger = null;

  const setExpandedState = (isExpanded) => {
    openButtons.forEach((button) => {
      button.setAttribute('aria-expanded', isExpanded ? 'true' : 'false');
    });
  };

  const loadQrImage = () => {
    if (!qrImage || qrImage.getAttribute('src')) {
      return;
    }

    const source = qrImage.dataset.src?.trim();
    if (source) {
      qrImage.setAttribute('src', source);
    }
  };

  const closeModal = () => {
    modal.hidden = true;
    modal.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('wa-modal-open');
    setExpandedState(false);

    if (lastTrigger && typeof lastTrigger.focus === 'function') {
      lastTrigger.focus();
    }

    lastTrigger = null;
  };

  const openModal = (trigger) => {
    lastTrigger = trigger instanceof HTMLElement ? trigger : document.activeElement;
    loadQrImage();
    modal.hidden = false;
    modal.setAttribute('aria-hidden', 'false');
    document.body.classList.add('wa-modal-open');
    setExpandedState(true);

    window.requestAnimationFrame(() => {
      closeButton?.focus();
    });
  };

  openButtons.forEach((button) => {
    button.addEventListener('click', () => {
      openModal(button);
    });
  });

  closeButtons.forEach((button) => {
    button.addEventListener('click', () => {
      closeModal();
    });
  });

  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && !modal.hidden) {
      closeModal();
    }
  });
})();
