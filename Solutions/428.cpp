#include<iostream>
#include<bits/stdc++.h>
using namespace std;

int main() {
    int t,i,j,gs=0,ss=0,temp=0;
    cin>>t;
    int a[t];
    for(i=0;i<t;i++)
        cin>>a[i];
    for(i=0;i<t;i++)
    {
        temp=0;
        for(j=0;j<=i;j++)
        {
        temp+=a[j];
        }
    gs+=temp;
    }
    sort(a,a+t);
     for(i=0;i<t;i++)
    {
        temp=0;
        for(j=0;j<=i;j++)
        {
        temp+=a[j];
        }
    ss+=temp;
    }
    cout<<gs-ss;
	return(0);
}
