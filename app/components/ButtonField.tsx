// Button component

import React from "react";
import { View, Text, StyleSheet, Pressable } from "react-native";
import { Colors } from "@/constants/Colors";

interface ButtonFieldProps {
  name: string;
  type?:
    | "primary"
    | "secondary"
    | "danger"
    | "warning"
    | "success"
    | "info"
    | "light"
    | "dark";
  disabled?: boolean;
  onClick?: (text: any) => void;
}

const ButtonField = ({
  name,
  type = "primary",
  disabled,
  onClick,
}: ButtonFieldProps) => {
  return (
    <View style={styles.container}>
      <Pressable
        style={styles.button[type]}
        disabled={disabled}
        onPress={onClick}
      >
        <Text style={styles.text[type]}>{name}</Text>
      </Pressable>
    </View>
  );
};

const styles: any = StyleSheet.create({
  container: {
    marginVertical: 10,
    paddingHorizontal: 10,
    width: "100%",
  },
  button: {
    primary: {
      backgroundColor: Colors.primary,
      borderRadius: 5,
      width: "100%",
      paddingHorizontal: 14,
      paddingVertical: 8,
      fontSize: 20,
      fontWeight: 400,
      lineHeight: 1.5,
      color: Colors.bodyColor,
      borderWidth: Colors.borderWidth,
      borderColor: Colors.primary,
    },
    secondary: {
      backgroundColor: Colors.secondary,
      borderRadius: 5,
      width: "100%",
      paddingHorizontal: 14,
      paddingVertical: 8,
      fontSize: 20,
      fontWeight: 400,
      lineHeight: 1.5,
      color: Colors.bodyColor,
      borderWidth: Colors.borderWidth,
      borderColor: Colors.secondary,
    },
    danger: {
      backgroundColor: Colors.danger,
      borderRadius: 5,
      width: "100%",
      paddingHorizontal: 14,
      paddingVertical: 8,
      fontSize: 20,
      fontWeight: 400,
      lineHeight: 1.5,
      color: Colors.bodyColor,
      borderWidth: Colors.borderWidth,
      borderColor: Colors.danger,
    },
    warning: {
      backgroundColor: Colors.warning,
      borderRadius: 5,
      width: "100%",
      paddingHorizontal: 14,
      paddingVertical: 8,
      fontSize: 20,
      fontWeight: 400,
      lineHeight: 1.5,
      color: Colors.bodyBg,
      borderWidth: Colors.borderWidth,
      borderColor: Colors.warning,
    },
    success: {
      backgroundColor: Colors.success,
      borderRadius: 5,
      width: "100%",
      paddingHorizontal: 14,
      paddingVertical: 8,
      fontSize: 20,
      fontWeight: 400,
      lineHeight: 1.5,
      color: Colors.bodyColor,
      borderWidth: Colors.borderWidth,
      borderColor: Colors.success,
    },
    info: {
      backgroundColor: Colors.info,
      borderRadius: 5,
      width: "100%",
      paddingHorizontal: 14,
      paddingVertical: 8,
      fontSize: 20,
      fontWeight: 400,
      lineHeight: 1.5,
      color: Colors.bodyColor,
      borderWidth: Colors.borderWidth,
      borderColor: Colors.info,
    },
    light: {
      backgroundColor: Colors.light,
      borderRadius: 5,
      width: "100%",
      paddingHorizontal: 14,
      paddingVertical: 8,
      fontSize: 20,
      fontWeight: 400,
      lineHeight: 1.5,
      color: Colors.bodyColor,
      borderWidth: Colors.borderWidth,
      borderColor: Colors.light,
    },
    dark: {
      backgroundColor: Colors.dark,
      borderRadius: 5,
      width: "100%",
      paddingHorizontal: 14,
      paddingVertical: 8,
      fontSize: 20,
      fontWeight: 400,
      lineHeight: 1.5,
      color: Colors.bodyColor,
      borderWidth: Colors.borderWidth,
      borderColor: Colors.dark,
    },
  },

  text: {
    primary: {
      color: Colors.bodyColor,
      fontSize: 20,
      textAlign: "center",
    },
    secondary: {
      color: Colors.bodyColor,
      fontSize: 20,
      textAlign: "center",
    },
    danger: {
      color: Colors.bodyColor,
      fontSize: 20,
      textAlign: "center",
    },
    warning: {
      color: Colors.bodyBg,
      fontSize: 20,
      textAlign: "center",
    },
    success: {
      color: Colors.bodyColor,
      fontSize: 20,
      textAlign: "center",
    },
    info: {
      color: Colors.bodyColor,
      fontSize: 20,
      textAlign: "center",
    },
    light: {
      color: Colors.bodyBg,
      fontSize: 20,
      textAlign: "center",
    },
    dark: {
      color: Colors.bodyColor,
      fontSize: 20,
      textAlign: "center",
    },
  },
} as any);

export default ButtonField;
