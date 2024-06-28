// Input Field Component

import { Colors } from "@/constants/Colors";
import React, { useState } from "react";
import { StyleSheet, Pressable, Text, View } from "react-native";
import { Ionicons } from "@expo/vector-icons";

interface CheckBoxInputFieldProps {
  label?: string;
  isChecked?: boolean;
  disabled?: boolean;
  onChange?: (checked: any) => void;
}

const CheckBoxInputField = ({
  label,
  isChecked,
  disabled,
  onChange,
}: CheckBoxInputFieldProps) => {
  const [checked, setChecked] = useState(isChecked || false);

  const changed = () => {
    setChecked(!checked);
    onChange && onChange(!checked);
  };
  return (
    <View style={styles.container}>
      <Pressable
        disabled={disabled}
        style={[styles.checkboxBase, checked && styles.checkboxChecked]}
        onPress={changed}
      >
        {checked && <Ionicons name="checkmark" size={24} color="white" />}
      </Pressable>
      <Text onPress={changed} style={styles.label}>{label}</Text>
    </View>
  );
};

const styles: any = StyleSheet.create({
  container: {
    marginBottom: 10,
    paddingHorizontal: 10,
    width: "100%",
    display: "flex",
    flexDirection: "row",
  },
  label: {
    fontSize: 16,
    fontWeight: 500,
    color: Colors.bodyColor,
    marginLeft: 10,
  },
  checkboxBase: {
    width: 24,
    height: 24,
    justifyContent: "center",
    alignItems: "center",
    borderRadius: 4,
    borderWidth: 2,
    borderColor: "#8c68cd",
    backgroundColor: "transparent",
  },
  checkboxChecked: {
    backgroundColor: "#8c68cd",
  },
});

export default CheckBoxInputField;
