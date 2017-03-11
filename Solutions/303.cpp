#include<stdio.h>
void main()
{
  int n;
  scanf("%d",&n);
  int a[n];
  for(int i=0;i<n;i++)
  scanf("%d",&a[i]);
  int q;
  scanf("%d",&q);
  int r,s;
  int prod[q];
  for(int j=0;j<q;j++)
  {scanf("%d %d",&r,&s);

    for(int k=r;k<s;k++)
    {
      if(prod[j]%a[k])
      prod[j]*=a[k];
    }
  }
  for(int j=0;j<q;j++)  printf("%d\n",prod[j]);
return 0;
  }

