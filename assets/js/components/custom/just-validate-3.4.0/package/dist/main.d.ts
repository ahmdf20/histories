import { EventListenerInterface, FieldConfigInterface, FieldRuleInterface, GlobalConfigInterface, GroupFieldInterface, GroupFieldsInterface, GroupFieldType, GroupRuleInterface, FieldInterface, FieldsInterface, LocaleInterface, TooltipPositionType, TooltipInstance, ElemValueType, CustomMessageFuncType } from './modules/interfaces';
declare class JustValidate {
    form: HTMLFormElement | null;
    fields: FieldsInterface;
    groupFields: GroupFieldsInterface;
    errors: {
        [key: string]: {
            message?: string;
        };
    };
    isValid: boolean;
    isSubmitted: boolean;
    globalConfig: GlobalConfigInterface;
    errorLabels: HTMLDivElement[];
    successLabels: HTMLDivElement[];
    eventListeners: EventListenerInterface[];
    dictLocale: LocaleInterface[];
    currentLocale?: string;
    customStyleTags: {
        [id: string]: HTMLStyleElement;
    };
    onSuccessCallback?: (event: Event) => void;
    onFailCallback?: (fields: FieldsInterface, groups: GroupFieldsInterface) => void;
    tooltips: TooltipInstance[];
    lastScrollPosition?: number;
    isScrollTick?: boolean;
    constructor(form: string | Element, globalConfig?: Partial<GlobalConfigInterface>, dictLocale?: LocaleInterface[]);
    initialize(form: string | Element, globalConfig?: Partial<GlobalConfigInterface>, dictLocale?: LocaleInterface[]): void;
    refreshAllTooltips: () => void;
    handleDocumentScroll: () => void;
    getLocalisedString(str?: string): string | undefined;
    getFieldErrorMessage(fieldRule: FieldRuleInterface, elem: HTMLInputElement): string;
    getFieldSuccessMessage(successMessage: string | CustomMessageFuncType, elem: HTMLInputElement): string | undefined;
    getGroupErrorMessage(groupRule: GroupRuleInterface): string;
    getGroupSuccessMessage(groupRule: GroupRuleInterface): string | undefined;
    setFieldInvalid(field: string, fieldRule: FieldRuleInterface): void;
    setFieldValid(field: string, successMessage?: string | CustomMessageFuncType): void;
    setGroupInvalid(groupName: string, groupRule: GroupRuleInterface): void;
    setGroupValid(groupName: string, groupRule: GroupRuleInterface): void;
    getElemValue(elem: HTMLInputElement): ElemValueType;
    validateGroupRule(groupName: string, type: GroupFieldType, elems: HTMLInputElement[], groupRule: GroupRuleInterface): Promise<any> | void;
    validateFieldRule(field: string, elem: HTMLInputElement, fieldRule: FieldRuleInterface, afterInputChanged?: boolean): Promise<any> | void;
    validateField(fieldName: string, field: FieldInterface, afterInputChanged?: boolean): Promise<any> | void;
    validateGroup(groupName: string, group: GroupFieldInterface): Promise<any> | void;
    focusInvalidField(): void;
    afterSubmitValidation(): void;
    validate(): Promise<any>;
    formSubmitHandler: (ev: Event) => void;
    setForm(form: HTMLFormElement): void;
    handleFieldChange: (target: HTMLInputElement) => void;
    handleGroupChange: (target: HTMLInputElement) => void;
    handlerChange: (ev: Event) => void;
    addListener(type: string, elem: HTMLInputElement | Document | HTMLFormElement, handler: (ev: Event) => void): void;
    removeListener(type: string, elem: HTMLInputElement | Document | HTMLFormElement, handler: (ev: Event) => void): void;
    addField(field: string, rules: FieldRuleInterface[], config?: FieldConfigInterface): JustValidate;
    removeField(field: string): JustValidate;
    removeGroup(group: string): JustValidate;
    addRequiredGroup(groupField: string, errorMessage?: string, config?: FieldConfigInterface, successMessage?: string): JustValidate;
    getListenerType(type: string): 'change' | 'input' | 'keyup';
    setListeners(elem: HTMLInputElement): void;
    clearErrors(): void;
    isTooltip(): boolean;
    lockForm(): void;
    unlockForm(): void;
    renderTooltip(elem: HTMLElement, errorLabel: HTMLDivElement, position?: TooltipPositionType): TooltipInstance;
    createErrorLabelElem(name: string, errorMessage: string, config?: FieldConfigInterface): HTMLDivElement;
    createSuccessLabelElem(name: string, successMessage?: string, config?: FieldConfigInterface): HTMLDivElement | null;
    renderErrorsContainer(label: HTMLDivElement, errorsContainer?: string | null | Element): boolean;
    renderGroupLabel(elem: HTMLElement, label: HTMLDivElement, errorsContainer?: string | null | Element, isSuccess?: boolean): void;
    renderFieldLabel(elem: HTMLInputElement, label: HTMLDivElement, errorsContainer?: string | null | Element, isSuccess?: boolean): void;
    renderErrors(): void;
    destroy(): void;
    refresh(): void;
    setCurrentLocale(locale?: string): void;
    onSuccess(callback: (ev?: Event) => void): JustValidate;
    onFail(callback: (fields: FieldsInterface, groups: GroupFieldsInterface) => void): JustValidate;
}
export default JustValidate;
