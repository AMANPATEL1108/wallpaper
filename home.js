window.onload = function () {
    showContent('contentHome');
};

function showContent(contentId) {
    var contentDivs = document.querySelectorAll('.content');
    contentDivs.forEach(function (div) {
        div.style.display = 'none';
    });

    document.getElementById(contentId).style.display = 'block';
}

function viewImage(imageSrc) {
    // Create a modal (popup) container
    var modalContainer = document.createElement('div');
    modalContainer.className = 'modal-container';

    // Create an image element within the modal
    var modalImage = document.createElement('img');
    modalImage.src = imageSrc;

    // Create a close button within the modal
    var closeButton = document.createElement('button');
    closeButton.innerText = 'Close';
    closeButton.onclick = function () {
        document.body.removeChild(modalContainer);
    };

    // Append elements to the modal container
    modalContainer.appendChild(modalImage);
    modalContainer.appendChild(closeButton);

    // Append the modal container to the body
    document.body.appendChild(modalContainer);
}

function downloadImage(imageSrc) {
    // Create an anchor element and trigger a download
    var link = document.createElement('a');
    link.href = imageSrc;
    link.download = 'downloaded_image.jpg';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}


