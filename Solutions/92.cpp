#include<iostream>
using namespace std;
int  main()
{
int i,j,t;
int a[100001] = {0};
a[1]=1;
for(i=2;i<=100001/2;++i)
for(j=2;j*i<=100001;++j)
a[j*i]=1;
cin>>t;
while(t--)
{
cin>>i;
if(a[i]==1)
cout<<"NO"<<endl;
else
cout<<"YES"<<endl;
}
return 0;
}
