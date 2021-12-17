VERSION 5.00
Object = "{0ECD9B60-23AA-11D0-B351-00A0C9055D8E}#6.0#0"; "MSHFLXGD.OCX"
Begin VB.Form frmDiagnosa 
   BorderStyle     =   1  'Fixed Single
   Caption         =   "Form1"
   ClientHeight    =   7635
   ClientLeft      =   45
   ClientTop       =   330
   ClientWidth     =   7590
   LinkTopic       =   "Form1"
   MaxButton       =   0   'False
   MinButton       =   0   'False
   ScaleHeight     =   7635
   ScaleWidth      =   7590
   StartUpPosition =   3  'Windows Default
   Begin VB.CommandButton cmdAmbilData 
      Caption         =   "AMBIL DATA"
      Height          =   615
      Left            =   5760
      TabIndex        =   2
      Top             =   360
      Width           =   1575
   End
   Begin VB.TextBox txtDiagnosa 
      Appearance      =   0  'Flat
      Height          =   615
      Left            =   360
      TabIndex        =   1
      Top             =   360
      Width           =   5415
   End
   Begin MSHierarchicalFlexGridLib.MSHFlexGrid fgData 
      Height          =   5895
      Left            =   360
      TabIndex        =   0
      Top             =   1080
      Width           =   6975
      _ExtentX        =   12303
      _ExtentY        =   10398
      _Version        =   393216
      _NumberOfBands  =   1
      _Band(0).Cols   =   2
   End
End
Attribute VB_Name = "frmDiagnosa"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Dim req As WinHttp.WinHttpRequest
Dim url As String
Private Sub cmdAmbilData_Click()
    Dim p As Object
    Dim jmlRecord As Integer
    
    If (Len(txtDiagnosa.Text)) = 0 Then
        Call MsgBox("Text Diagnosa Kosong")
        Exit Sub
    End If
    url = "http://localhost/jknapi/refdiag"
    tpost = "diagnosa=" & Trim(txtDiagnosa.Text)
    
    Set req = New WinHttp.WinHttpRequest
    req.Open "POST", url, False
    req.SetRequestHeader "Content-Type", "application/x-www-form-urlencoded"
    req.Send tpost
    
    If req.Status = "200" Then
      Set p = JSON.parse(req.ResponseText)
      jmlRecord = p("response").Item("diagnosa").Count
      fgData.Cols = 3
      fgData.rows = jmlRecord + 1
      fgData.TextMatrix(0, 1) = "KODE"
      fgData.TextMatrix(0, 2) = "DIAGNOSA"
      fgData.ColWidth(1) = 1000
      fgData.ColWidth(2) = 3000
        For i = 1 To jmlRecord
            fgData.TextMatrix(i, 1) = p("response").Item("diagnosa")(i)("kode")
            fgData.TextMatrix(i, 2) = p("response").Item("diagnosa")(i)("nama")
        Next i
   End If
    
    
End Sub
