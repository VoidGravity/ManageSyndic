// Input Field Component

import { Colors } from "@/constants/Colors";
import React from "react";
import { View, Text, TextInput, StyleSheet } from "react-native";

interface TextInputFieldProps {
  label?: string;
  value?: string;
  placeholder?: string;
  disabled?: boolean;
  readonly?: boolean;
  type?: "text" | "password" | "email" | "number";
  errors?: string[];
  infos?: string[];
  onChangeText?: (text: any) => void;
}

const TextInputField = ({
  label,
  value,
  placeholder,
  disabled,
  readonly,
  onChangeText,
  type,
  errors,
  infos
}: TextInputFieldProps) => {
  return (
    <View style={styles.container}>
      <Text style={styles.label}>{label}</Text>
      <TextInput
        passwordRules={
          readonly ? "deny-editing" : "required: lower; required: upper; required: digit; max-consecutive: 2; minlength: 8;"
        }
        secureTextEntry={type === "password"}
        editable={!disabled && !readonly}
        readOnly={readonly}
        style={{...styles.input,backgroundColor: disabled?Colors.primaryBgSubtle:Colors.inputBgCustom,}}
        value={value}
        placeholder={placeholder}
        onChangeText={onChangeText}
        placeholderTextColor={Colors.secondaryColor}
      />
      {infos && infos.map((error, index) => (
        <Text key={index} style={{ color: Colors.bodyColor, fontSize: 12, marginTop: 5 }}>{error}</Text>
      ))
      }
      {errors && errors.map((error, index) => (
        <Text key={index} style={{ color: Colors.danger, fontSize: 12, marginTop: 5 }}>{error}</Text>
      ))
      }
    </View>
  );
};

const styles = StyleSheet.create({
  container: {
    marginBottom: 10,
    paddingHorizontal: 10,
    width: "100%",
  },
  label: {
    fontSize: 16,
    fontWeight: 500,
    color: Colors.bodyColor,
    marginBottom: 14,
  },
  input: {
    backgroundColor: Colors.primary,
    borderRadius: 5,
    width: "100%",
    paddingHorizontal: 14,
    paddingVertical: 12,
    fontSize: 16,
    fontWeight: 400,
    lineHeight: 1.5,
    color: Colors.bodyColor,
    borderWidth: Colors.borderWidth,
    borderColor: Colors.inputBorderCustom,
  },
});

export default TextInputField;
