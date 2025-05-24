document.addEventListener('DOMContentLoaded', function () {
    const isbnInput = document.getElementById('isbn');

    if (!isbnInput) {
        // Jika elemen tidak ditemukan, jangan lanjutkan untuk menghindari error
        // Anda bisa menambahkan console.log('Elemen ISBN tidak ditemukan'); jika perlu debugging
        return;
    }

    const formatIsbn = (inputElement) => {
        let value = inputElement.value;
        let originalCursorPos = inputElement.selectionStart;
        let valueBeforeCursor = value.substring(0, originalCursorPos);
        let digitsBeforeCursor = valueBeforeCursor.replace(/[^\d]/g, '').length;

        let digits = value.replace(/[^\d]/g, '');

        if (digits.length > 13) {
            digits = digits.substring(0, 13);
        }

        let formattedValue = '';
        if (digits.length > 0) {
            if (digits.length > 4) {
                formattedValue = digits.substring(0, 4) + '-' + digits.substring(4);
            } else {
                formattedValue = digits;
            }
        }

        inputElement.value = formattedValue;

        if (value !== formattedValue) {
            let newCursorPos = 0;
            let currentDigitsCount = 0;
            for (let i = 0; i < formattedValue.length && currentDigitsCount < digitsBeforeCursor; i++) {
                if (formattedValue[i] >= '0' && formattedValue[i] <= '9') {
                    currentDigitsCount++;
                }
                newCursorPos++;
            }

            if (digitsBeforeCursor === 0 && originalCursorPos === 0) {
                 newCursorPos = 0;
            } else if (currentDigitsCount < digitsBeforeCursor && newCursorPos < formattedValue.length) {
                // Logic handled by loop
            } else if (digitsBeforeCursor > 0 && newCursorPos === 0 && formattedValue.length > 0) {
                 newCursorPos = formattedValue.length;
            }

            if (formattedValue.length > 0 && (newCursorPos === 0 && digitsBeforeCursor > 0)){
                 if(digits.length <= 4 && digitsBeforeCursor <= digits.length) newCursorPos = digitsBeforeCursor;
                 else if (digits.length > 4 && digitsBeforeCursor <= 4) newCursorPos = digitsBeforeCursor;
                 else if (digits.length > 4 && digitsBeforeCursor > 4) newCursorPos = digitsBeforeCursor + 1;
                 else newCursorPos = formattedValue.length;
            }

            if (newCursorPos > formattedValue.length) {
                newCursorPos = formattedValue.length;
            }

            try {
                inputElement.setSelectionRange(newCursorPos, newCursorPos);
            } catch (e) {
                console.warn("Tidak dapat mengatur rentang pilihan:", e);
            }
        }
    };

    if (isbnInput.value) {
        formatIsbn(isbnInput);
    }

    isbnInput.addEventListener('input', function () {
        formatIsbn(this);
    });

    isbnInput.addEventListener('paste', function(event) {
        setTimeout(() => {
            formatIsbn(this);
        }, 0);
    });
});