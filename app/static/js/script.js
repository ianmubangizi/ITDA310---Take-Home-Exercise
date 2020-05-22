// Helper Functions
const valueOf = (html) => html.value
const getById = (id) => document.getElementById(id)
const getByTag = (tag) => document.querySelector(tag)
const setValueOf = (html, value) => html.value = value
const parentRemoveChild = (element) => element.parentNode.removeChild(element)
const removeOnTimeOut = (element, cb, time = 3000) => setTimeout(() => parentRemoveChild(element), time)

function validate(form, fields = {min: 0, max: form.elements.length}, errors = []) {
    const {min, max} = fields
    if (min < max) {
        let field = form.elements[min]
        if (validateIfEmpty(field) === "") {
            return validate(form, {min: min + 1, max: max}, errors);
        } else {
            errors[min] = validateIfEmpty(field)
            insert(errors[min], field)
            return validate(form, {min: min + 1, max: max}, errors);
        }
    }
    return errors.length === 0
}

function validateIfEmpty(field) {
    const error = (field) => `No ${field.name} entered \n`;
    return valueOf(field) === "" ? error(field) : ""
}

const insert = (error, field) => {
    let input = getById(field.id)
    let errorId = `${field.name}-error`
    let message = `<p id="${errorId}" class="text-red-500 text-xs italic">${error}</p>`
    input.classList.toggle('border-red-500')
    input.insertAdjacentHTML("afterend", message)
    removeOnTimeOut(getById(errorId))
    setTimeout(() => input.classList.toggle('border-red-500'), 3000)
}