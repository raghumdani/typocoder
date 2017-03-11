#include<iostream>
 using namespace std;
 
int main() {
    int t,i,p=1,r;
    cin>>t;
    int a[t];
    for(i=0;i<t;i++)
        cin>>a[i];
    for(i=0;i<t;i++)
    {
        p=1;
        while(a[i]!=0)
        {
        r=a[i]%10;
        p*=r;
        a[i]=a[i]/10;
        }
        cout<<p;
    }
    return(0);
}